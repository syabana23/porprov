/**
 * CustomSelect - Reusable Modern Custom Select Engine for PORPROV XV
 * Transforms native HTML <select> elements into production-ready floating dropdowns
 * with 100% reactive two-way binding, keyboard navigation, search filtering, and zero regressions.
 */

export class CustomSelect {
  constructor(selectEl, options = {}) {
    if (!selectEl || selectEl.dataset.customSelectInit === 'true') return;
    this.selectEl = selectEl;
    this.selectEl.dataset.customSelectInit = 'true';

    this.options = Object.assign({
      searchable: selectEl.dataset.searchable === 'true' || selectEl.options.length >= 6,
      placeholder: selectEl.dataset.placeholder || (selectEl.options[0] ? selectEl.options[0].text : 'Pilih...'),
    }, options);

    this.isOpen = false;
    this.highlightIndex = -1;
    this.filteredOptions = [];

    this.initDOM();
    this.bindEvents();
    this.observeNativeSelect();
  }

  static getIconHtml(selectEl) {
    const id = (selectEl.id || '').toLowerCase();
    const name = (selectEl.name || '').toLowerCase();
    const cls = (selectEl.className || '').toLowerCase();

    if (id.includes('venue') || name.includes('venue') || cls.includes('venue')) {
      // Map Pin Icon
      return `<svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="cs-icon-svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22s8-5.5 8-12c0-4.42-3.58-8-8-8s-8 3.58-8 8c0 6.5 8 12 8 12z" />
        <circle cx="12" cy="10" r="3" />
      </svg>`;
    }

    if (id.includes('cabor') || name.includes('cabor') || cls.includes('cabor')) {
      // Trophy / Sports Icon
      return `<svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="cs-icon-svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15l-2 5l-2-2l-2 2l1-4.5" />
        <circle cx="12" cy="8" r="5" stroke-width="2" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 8H4a2 2 0 00-2 2v1a3 3 0 003 3h1M18 8h2a2 2 0 012 2v1a3 3 0 01-3 3h-1" />
      </svg>`;
    }

    if (id.includes('fasilitas') || name.includes('fasilitas') || id.includes('type') || cls.includes('type')) {
      // Building / Facility Icon
      return `<svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="cs-icon-svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0v-5a2 2 0 012-2h2a2 2 0 012 2v5m-4 0h4" />
      </svg>`;
    }

    if (id.includes('sort') || name.includes('sort')) {
      // Sort Icon
      return `<svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="cs-icon-svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
      </svg>`;
    }

    // Default Filter/List Icon
    return `<svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="cs-icon-svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
    </svg>`;
  }

  initDOM() {
    // Hide native select visually while keeping it form accessible
    this.selectEl.classList.add('cs-native-hidden');

    // Create wrapper
    this.wrapper = document.createElement('div');
    this.wrapper.className = 'custom-select-wrapper';
    if (this.selectEl.disabled) this.wrapper.classList.add('cs-disabled');

    // Copy essential layout classes or custom attributes if present
    if (this.selectEl.dataset.class) {
      this.wrapper.classList.add(...this.selectEl.dataset.class.split(' '));
    }

    // Trigger button
    this.trigger = document.createElement('button');
    this.trigger.type = 'button';
    this.trigger.className = 'cs-trigger';
    this.trigger.setAttribute('aria-haspopup', 'listbox');
    this.trigger.setAttribute('aria-expanded', 'false');
    this.trigger.tabIndex = this.selectEl.disabled ? -1 : 0;

    // Icon
    const iconWrapper = document.createElement('span');
    iconWrapper.className = 'cs-icon-wrap';
    iconWrapper.innerHTML = CustomSelect.getIconHtml(this.selectEl);

    // Label span
    this.labelSpan = document.createElement('span');
    this.labelSpan.className = 'cs-label';

    // Chevron
    const chevron = document.createElement('span');
    chevron.className = 'cs-chevron';
    chevron.innerHTML = `<svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 9l-7 7-7-7" />
    </svg>`;

    this.trigger.appendChild(iconWrapper);
    this.trigger.appendChild(this.labelSpan);
    this.trigger.appendChild(chevron);

    // Dropdown Panel
    this.dropdown = document.createElement('div');
    this.dropdown.className = 'cs-dropdown';
    this.dropdown.setAttribute('role', 'listbox');

    // Search Input container if searchable
    if (this.options.searchable) {
      this.searchWrap = document.createElement('div');
      this.searchWrap.className = 'cs-search-wrap';
      this.searchInput = document.createElement('input');
      this.searchInput.type = 'text';
      this.searchInput.className = 'cs-search-input';
      this.searchInput.placeholder = 'Cari...';
      this.searchInput.setAttribute('aria-label', 'Cari opsi');

      const searchIcon = document.createElement('span');
      searchIcon.className = 'cs-search-icon';
      searchIcon.innerHTML = `<svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <circle cx="11" cy="11" r="8" stroke-width="2" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35" />
      </svg>`;

      this.searchWrap.appendChild(searchIcon);
      this.searchWrap.appendChild(this.searchInput);
      this.dropdown.appendChild(this.searchWrap);
    }

    // Options list container
    this.optionsList = document.createElement('ul');
    this.optionsList.className = 'cs-options-list';
    this.dropdown.appendChild(this.optionsList);

    // Empty state
    this.emptyEl = document.createElement('div');
    this.emptyEl.className = 'cs-empty';
    this.emptyEl.textContent = 'Tidak ada hasil ditemukan';
    this.emptyEl.style.display = 'none';
    this.dropdown.appendChild(this.emptyEl);

    // Mount wrapper to DOM right next to native select
    this.selectEl.parentNode.insertBefore(this.wrapper, this.selectEl);
    this.wrapper.appendChild(this.selectEl);
    this.wrapper.appendChild(this.trigger);
    this.wrapper.appendChild(this.dropdown);

    this.rebuildOptions();
    this.updateTriggerLabel();
  }

  rebuildOptions() {
    this.optionsList.innerHTML = '';
    const nativeOptions = Array.from(this.selectEl.options);

    // Re-check searchable threshold if list changed dynamically
    const isSearchable = this.selectEl.dataset.searchable === 'true' || nativeOptions.length >= 6;
    if (isSearchable && !this.searchWrap) {
      this.options.searchable = true;
      this.searchWrap = document.createElement('div');
      this.searchWrap.className = 'cs-search-wrap';
      this.searchInput = document.createElement('input');
      this.searchInput.type = 'text';
      this.searchInput.className = 'cs-search-input';
      this.searchInput.placeholder = 'Cari...';
      const searchIcon = document.createElement('span');
      searchIcon.className = 'cs-search-icon';
      searchIcon.innerHTML = `<svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8" stroke-width="2" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35" /></svg>`;
      this.searchWrap.appendChild(searchIcon);
      this.searchWrap.appendChild(this.searchInput);
      this.dropdown.insertBefore(this.searchWrap, this.optionsList);
      this.bindSearchInput();
    }

    this.filteredOptions = nativeOptions;

    nativeOptions.forEach((opt, idx) => {
      const li = document.createElement('li');
      li.className = 'cs-option';
      li.dataset.value = opt.value;
      li.dataset.index = idx;
      li.setAttribute('role', 'option');

      if (opt.disabled) {
        li.classList.add('cs-option-disabled');
      }

      if (opt.selected) {
        li.classList.add('cs-selected');
        li.setAttribute('aria-selected', 'true');
      }

      const textSpan = document.createElement('span');
      textSpan.className = 'cs-option-text';
      textSpan.textContent = opt.text;

      const checkIcon = document.createElement('span');
      checkIcon.className = 'cs-check-icon';
      checkIcon.innerHTML = `<svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20 6L9 17l-5-5" />
      </svg>`;

      li.appendChild(textSpan);
      li.appendChild(checkIcon);

      li.addEventListener('click', (e) => {
        e.stopPropagation();
        if (opt.disabled) return;
        this.selectOption(idx);
      });

      this.optionsList.appendChild(li);
    });

    this.updateTriggerLabel();
  }

  updateTriggerLabel() {
    const selectedOpt = this.selectEl.options[this.selectEl.selectedIndex];
    if (selectedOpt && selectedOpt.value !== '') {
      this.labelSpan.textContent = selectedOpt.text;
      this.labelSpan.classList.remove('cs-placeholder');
      this.wrapper.classList.add('cs-has-value');
    } else if (selectedOpt) {
      this.labelSpan.textContent = selectedOpt.text;
      this.labelSpan.classList.add('cs-placeholder');
      this.wrapper.classList.remove('cs-has-value');
    } else {
      this.labelSpan.textContent = this.options.placeholder;
      this.labelSpan.classList.add('cs-placeholder');
      this.wrapper.classList.remove('cs-has-value');
    }

    // Highlight active option in list
    const items = this.optionsList.querySelectorAll('.cs-option');
    items.forEach((item) => {
      const idx = parseInt(item.dataset.index, 10);
      if (idx === this.selectEl.selectedIndex) {
        item.classList.add('cs-selected');
        item.setAttribute('aria-selected', 'true');
      } else {
        item.classList.remove('cs-selected');
        item.setAttribute('aria-selected', 'false');
      }
    });
  }

  selectOption(index) {
    if (index < 0 || index >= this.selectEl.options.length) return;
    this.selectEl.selectedIndex = index;

    // Dispatch native events for compatibility
    this.selectEl.dispatchEvent(new Event('change', { bubbles: true }));
    this.selectEl.dispatchEvent(new Event('input', { bubbles: true }));

    this.updateTriggerLabel();
    this.close();
    this.trigger.focus();
  }

  bindEvents() {
    // Trigger Click
    this.trigger.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      if (this.selectEl.disabled) return;
      this.toggle();
    });

    // Keyboard navigation on trigger & dropdown
    this.wrapper.addEventListener('keydown', (e) => {
      if (this.selectEl.disabled) return;

      switch (e.key) {
        case 'Enter':
        case ' ':
          if (!this.isOpen) {
            e.preventDefault();
            this.open();
          } else if (this.highlightIndex >= 0) {
            e.preventDefault();
            const visibleItems = Array.from(this.optionsList.querySelectorAll('.cs-option:not([style*="display: none"])'));
            const targetItem = visibleItems[this.highlightIndex];
            if (targetItem) {
              const originalIdx = parseInt(targetItem.dataset.index, 10);
              this.selectOption(originalIdx);
            }
          }
          break;
        case 'ArrowDown':
          e.preventDefault();
          if (!this.isOpen) {
            this.open();
          } else {
            this.moveHighlight(1);
          }
          break;
        case 'ArrowUp':
          e.preventDefault();
          if (!this.isOpen) {
            this.open();
          } else {
            this.moveHighlight(-1);
          }
          break;
        case 'Escape':
          if (this.isOpen) {
            e.preventDefault();
            this.close();
            this.trigger.focus();
          }
          break;
        case 'Tab':
          if (this.isOpen) {
            this.close();
          }
          break;
      }
    });

    if (this.searchInput) {
      this.bindSearchInput();
    }

    // Document click outside listener
    this._onDocClick = (e) => {
      if (this.isOpen && !this.wrapper.contains(e.target)) {
        this.close();
      }
    };
    document.addEventListener('click', this._onDocClick);

    // Sync when native select triggers change event externally
    this.selectEl.addEventListener('change', () => {
      this.updateTriggerLabel();
    });

    // Handle form reset
    if (this.selectEl.form) {
      this.selectEl.form.addEventListener('reset', () => {
        setTimeout(() => {
          this.updateTriggerLabel();
        }, 10);
      });
    }
  }

  bindSearchInput() {
    if (!this.searchInput) return;

    this.searchInput.addEventListener('input', (e) => {
      const q = e.target.value.toLowerCase().trim();
      const items = Array.from(this.optionsList.querySelectorAll('.cs-option'));
      let visibleCount = 0;

      items.forEach((item) => {
        const text = item.querySelector('.cs-option-text').textContent.toLowerCase();
        if (!q || text.includes(q)) {
          item.style.display = '';
          visibleCount++;
        } else {
          item.style.display = 'none';
        }
      });

      if (visibleCount === 0) {
        this.emptyEl.style.display = 'block';
        this.optionsList.style.display = 'none';
      } else {
        this.emptyEl.style.display = 'none';
        this.optionsList.style.display = 'block';
      }

      this.highlightIndex = 0;
      this.updateHighlight();
    });

    this.searchInput.addEventListener('click', (e) => e.stopPropagation());
  }

  moveHighlight(dir) {
    const visibleItems = Array.from(this.optionsList.querySelectorAll('.cs-option:not([style*="display: none"])'));
    if (visibleItems.length === 0) return;

    this.highlightIndex += dir;
    if (this.highlightIndex < 0) this.highlightIndex = visibleItems.length - 1;
    if (this.highlightIndex >= visibleItems.length) this.highlightIndex = 0;

    this.updateHighlight(visibleItems);
  }

  updateHighlight(visibleItems) {
    const items = visibleItems || Array.from(this.optionsList.querySelectorAll('.cs-option:not([style*="display: none"])'));
    items.forEach((item, idx) => {
      if (idx === this.highlightIndex) {
        item.classList.add('cs-highlighted');
        item.scrollIntoView({ block: 'nearest' });
      } else {
        item.classList.remove('cs-highlighted');
      }
    });
  }

  toggle() {
    if (this.isOpen) {
      this.close();
    } else {
      this.open();
    }
  }

  open() {
    // Close any other open CustomSelect instance on the page
    document.querySelectorAll('.custom-select-wrapper.cs-open').forEach((wrap) => {
      if (wrap !== this.wrapper && wrap.__customSelect) {
        wrap.__customSelect.close();
      }
    });

    this.isOpen = true;
    this.wrapper.classList.add('cs-open');
    this.wrapper.__customSelect = this;
    this.trigger.setAttribute('aria-expanded', 'true');

    // Position check (viewport overflow)
    const rect = this.wrapper.getBoundingClientRect();
    const spaceBelow = window.innerHeight - rect.bottom;
    if (spaceBelow < 280 && rect.top > 280) {
      this.wrapper.classList.add('cs-drop-up');
    } else {
      this.wrapper.classList.remove('cs-drop-up');
    }

    if (this.searchInput) {
      this.searchInput.value = '';
      const items = Array.from(this.optionsList.querySelectorAll('.cs-option'));
      items.forEach((item) => (item.style.display = ''));
      this.emptyEl.style.display = 'none';
      this.optionsList.style.display = 'block';

      setTimeout(() => {
        this.searchInput.focus();
      }, 50);
    }

    // Set initial highlight index to currently selected
    const visibleItems = Array.from(this.optionsList.querySelectorAll('.cs-option:not([style*="display: none"])'));
    const selectedIndexInVisible = visibleItems.findIndex((item) => parseInt(item.dataset.index, 10) === this.selectEl.selectedIndex);
    this.highlightIndex = selectedIndexInVisible >= 0 ? selectedIndexInVisible : 0;
    this.updateHighlight(visibleItems);
  }

  close() {
    this.isOpen = false;
    this.wrapper.classList.remove('cs-open', 'cs-drop-up');
    this.trigger.setAttribute('aria-expanded', 'false');
    this.highlightIndex = -1;
  }

  observeNativeSelect() {
    // 1. MutationObserver to handle dynamic option updates (e.g. caborSelect.innerHTML = ...)
    this.observer = new MutationObserver(() => {
      this.rebuildOptions();
    });
    this.observer.observe(this.selectEl, { childList: true, subtree: true, attributes: true });

    // 2. Intercept native value setter to catch selectEl.value = 'xxx'
    const self = this;
    const proto = HTMLSelectElement.prototype;
    const valueDescriptor = Object.getOwnPropertyDescriptor(proto, 'value');
    const selectedIndexDescriptor = Object.getOwnPropertyDescriptor(proto, 'selectedIndex');

    if (valueDescriptor && valueDescriptor.set) {
      Object.defineProperty(this.selectEl, 'value', {
        get() {
          return valueDescriptor.get.call(this);
        },
        set(val) {
          valueDescriptor.set.call(this, val);
          self.updateTriggerLabel();
        },
        configurable: true
      });
    }

    if (selectedIndexDescriptor && selectedIndexDescriptor.set) {
      Object.defineProperty(this.selectEl, 'selectedIndex', {
        get() {
          return selectedIndexDescriptor.get.call(this);
        },
        set(idx) {
          selectedIndexDescriptor.set.call(this, idx);
          self.updateTriggerLabel();
        },
        configurable: true
      });
    }
  }

  static initAll(container = document) {
    const selects = container.querySelectorAll('select:not([data-custom-select-ignore])');
    selects.forEach((select) => {
      if (!select.dataset.customSelectInit) {
        new CustomSelect(select);
      }
    });
  }
}
