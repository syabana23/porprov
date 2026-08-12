/* ============================================================
   CHATBOT JS — ChatGPT-Style Premium UI with Markdown Support
   ============================================================ */

(function () {
    'use strict';

    // ----------------------------------------------------------------
    // DOM References
    // ----------------------------------------------------------------
    const toggle       = document.getElementById('chat-toggle');
    const chatWindow   = document.getElementById('chat-window');
    const chatBody     = document.getElementById('chat-body');
    const sendBtn      = document.getElementById('send-btn');
    const chatInput    = document.getElementById('chat-input');
    const closeBtn     = document.getElementById('chat-close-btn');
    const clearBtn     = document.getElementById('chat-clear-btn');
    const iconOpen     = document.getElementById('chat-icon-open');
    const iconClose    = document.getElementById('chat-icon-close');
    const suggestions  = document.querySelectorAll('.suggestion-chip');
    const badge        = document.getElementById('chat-badge');

    const BOT_NAME     = 'RAJA PORPROV';
    const STORAGE_KEY  = 'porprov_chat_v3';
    const CSRF         = document.querySelector('meta[name="csrf-token"]')?.content ?? '';

    // ----------------------------------------------------------------
    // Open / Close
    // ----------------------------------------------------------------
    let isOpen = false;

    function openChat() {
        isOpen = true;
        chatWindow.classList.add('is-open');
        iconOpen.style.display = 'none';
        iconClose.style.display = 'block';
        badge.style.display = 'none';
        toggle.setAttribute('aria-expanded', 'true');
        chatInput.focus();
        scrollToBottom(true);
    }

    function closeChat() {
        isOpen = false;
        chatWindow.classList.remove('is-open');
        iconOpen.style.display = 'block';
        iconClose.style.display = 'none';
        toggle.setAttribute('aria-expanded', 'false');
    }

    toggle.addEventListener('click', () => isOpen ? closeChat() : openChat());
    closeBtn.addEventListener('click', closeChat);

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isOpen) closeChat();
    });

    // ----------------------------------------------------------------
    // Clear chat
    // ----------------------------------------------------------------
    clearBtn.addEventListener('click', () => {
        if (!confirm('Hapus seluruh percakapan?')) return;
        chatBody.innerHTML = '';
        localStorage.removeItem(STORAGE_KEY);
        showWelcomeMessage();
    });

    // ----------------------------------------------------------------
    // Scroll
    // ----------------------------------------------------------------
    function scrollToBottom(instant = false) {
        if (instant) {
            chatBody.scrollTop = chatBody.scrollHeight;
        } else {
            chatBody.scrollTo({ top: chatBody.scrollHeight, behavior: 'smooth' });
        }
    }

    // ----------------------------------------------------------------
    // Time helpers
    // ----------------------------------------------------------------
    function nowTime() {
        return new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
    }

    function todayLabel() {
        return new Date().toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long' });
    }

    // ----------------------------------------------------------------
    // Simple HTML → plain text (for copy)
    // ----------------------------------------------------------------
    function htmlToText(html) {
        const tmp = document.createElement('div');
        tmp.innerHTML = html;
        return tmp.textContent || tmp.innerText || '';
    }

    // ----------------------------------------------------------------
    // Safe HTML Sanitizer (whitelist) — DOMParser based
    // ----------------------------------------------------------------
    const ALLOWED_TAGS = new Set(['STRONG', 'B', 'I', 'EM', 'U', 'BR', 'CODE', 'A', 'SPAN', 'P', 'UL', 'OL', 'LI']);
    const ALLOWED_ATTRS = {
        A:    ['href', 'target', 'rel'],
        CODE: ['class'],
        SPAN: ['class'],
        P:    ['class'],
    };

    function sanitizeHtml(html) {
        const doc = new DOMParser().parseFromString(`<div id="__cb_root">${html}</div>`, 'text/html');
        const root = doc.getElementById('__cb_root');
        if (!root) return '';

        function clean(node) {
            [...node.childNodes].forEach(child => {
                if (child.nodeType !== Node.ELEMENT_NODE) return;
                if (ALLOWED_TAGS.has(child.tagName)) {
                    [...child.attributes].forEach(attr => {
                        const allowed = (ALLOWED_ATTRS[child.tagName] || []).includes(attr.name);
                        if (attr.name.startsWith('on') || attr.name === 'style' || !allowed) {
                            child.removeAttribute(attr.name);
                        }
                    });
                    if (child.tagName === 'A') {
                        const href = (child.getAttribute('href') || '').trim();
                        if (!href || /^\s*(javascript|data|vbscript):/i.test(href)) {
                            child.removeAttribute('href');
                        } else {
                            child.setAttribute('target', '_blank');
                            child.setAttribute('rel', 'noopener noreferrer');
                        }
                    }
                    clean(child);
                } else {
                    while (child.firstChild) node.insertBefore(child.firstChild, child);
                    node.removeChild(child);
                }
            });
        }

        clean(root);
        return root.innerHTML;
    }

    // ----------------------------------------------------------------
    // Lightweight Markdown & Safe HTML Renderer
    // ----------------------------------------------------------------
    function renderMarkdown(text) {
        if (!text) return '';
        let html = text;
        // Bold: **text** or __text__
        html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
        html = html.replace(/__(.*?)__/g, '<strong>$1</strong>');
        // Italic: *text* or _text_
        html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');
        // Inline Code: `code`
        html = html.replace(/`([^`]+)`/g, '<code>$1</code>');
        // Style bullet markers (accent-colored bullet, rapi)
        html = html.replace(/(<br>\s*|^)\u2022\s*/g, '$1<span class="cb-bullet">\u2022</span> ');
        // Line breaks (if not already containing <br>)
        if (!html.includes('<br>') && !html.includes('<p>')) {
            html = html.replace(/\n/g, '<br>');
        }
        // Sanitize whitelist — mencegah XSS sambil tetap merender HTML dari server
        return sanitizeHtml(html);
    }

    // ----------------------------------------------------------------
    // Toast notification
    // ----------------------------------------------------------------
    let toastEl = document.querySelector('.cb-toast');
    if (!toastEl) {
        toastEl = document.createElement('div');
        toastEl.className = 'cb-toast';
        document.body.appendChild(toastEl);
    }

    function showToast(msg) {
        toastEl.textContent = msg;
        toastEl.classList.add('show');
        setTimeout(() => toastEl.classList.remove('show'), 2000);
    }

    // ----------------------------------------------------------------
    // Copy button
    // ----------------------------------------------------------------
    function makeCopyBtn(textToCopy) {
        const btn = document.createElement('button');
        btn.className = 'msg-copy';
        btn.title = 'Salin pesan';
        btn.innerHTML = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2"/><path stroke-linecap="round" stroke-linejoin="round" d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>`;
        btn.addEventListener('click', () => {
            navigator.clipboard.writeText(textToCopy).then(() => {
                showToast('✓ Pesan disalin!');
            }).catch(() => {
                const ta = document.createElement('textarea');
                ta.value = textToCopy;
                document.body.appendChild(ta);
                ta.select();
                document.execCommand('copy');
                document.body.removeChild(ta);
                showToast('✓ Pesan disalin!');
            });
        });
        return btn;
    }

    // ----------------------------------------------------------------
    // BOT Avatar SVG & USER Avatar SVG
    // ----------------------------------------------------------------
    const botAvatarSVG = `<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a5 5 0 100 10A5 5 0 0012 2zm0 12c-5.33 0-8 2.67-8 4v2h16v-2c0-1.33-2.67-4-8-4z"/></svg>`;
    const userAvatarSVG = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>`;

    // ----------------------------------------------------------------
    // Build message row
    // ----------------------------------------------------------------
    function buildMessageRow(htmlContent, sender, time, buttonData) {
        const row = document.createElement('div');
        row.className = `msg-row ${sender}-row`;

        const avatar = document.createElement('div');
        avatar.className = `msg-avatar ${sender === 'bot' ? 'bot-av' : 'user-av'}`;
        avatar.innerHTML = sender === 'bot' ? botAvatarSVG : userAvatarSVG;
        avatar.setAttribute('aria-hidden', 'true');

        const bubbleWrap = document.createElement('div');
        bubbleWrap.className = 'msg-bubble-wrap';

        const bubble = document.createElement('div');
        bubble.className = `msg-bubble ${sender}-bubble`;
        bubble.innerHTML = renderMarkdown(htmlContent);
        // Store raw content for JSON persistence (safe text, not rendered HTML)
        bubble.dataset.rawContent = htmlContent;

        // Action button inside bubble
        if (buttonData && buttonData.url && buttonData.text) {
            const link = document.createElement('a');
            link.className = 'cb-action-btn';
            link.href = buttonData.url;
            link.textContent = buttonData.text;
            if (buttonData.url.startsWith('http')) {
                link.target = '_blank';
                link.rel = 'noopener noreferrer';
            }
            bubble.appendChild(document.createElement('br'));
            bubble.appendChild(link);
        }

        bubbleWrap.appendChild(bubble);

        // Meta: timestamp + copy
        const meta = document.createElement('div');
        meta.className = 'msg-meta';

        const timeEl = document.createElement('span');
        timeEl.className = 'msg-time';
        timeEl.textContent = time || nowTime();

        const plainText = htmlToText(htmlContent);
        const copyBtn = makeCopyBtn(plainText);

        if (sender === 'user') {
            meta.appendChild(timeEl);
        } else {
            meta.appendChild(copyBtn);
            meta.appendChild(timeEl);
        }

        bubbleWrap.appendChild(meta);

        row.appendChild(avatar);
        row.appendChild(bubbleWrap);

        // Store button data for JSON persistence
        if (buttonData && buttonData.url && buttonData.text) {
            row.dataset.btnUrl  = buttonData.url;
            row.dataset.btnText = buttonData.text;
        }
        row.dataset.sender = sender;
        row.dataset.time   = timeEl.textContent;

        return row;
    }

    // ----------------------------------------------------------------
    // Add message to chat
    // ----------------------------------------------------------------
    function addMessage(content, sender, button = null) {
        const time = nowTime();
        const row = buildMessageRow(content, sender, time, button);
        chatBody.appendChild(row);
        scrollToBottom();
        saveChat();
    }

    // ----------------------------------------------------------------
    // Typing indicator
    // ----------------------------------------------------------------
    function showTyping() {
        const row = document.createElement('div');
        row.className = 'msg-row bot-row typing-row';
        row.id = 'cb-typing-indicator';

        const avatar = document.createElement('div');
        avatar.className = 'msg-avatar bot-av';
        avatar.innerHTML = botAvatarSVG;
        avatar.setAttribute('aria-hidden', 'true');

        const indicator = document.createElement('div');
        indicator.className = 'typing-indicator';
        indicator.innerHTML = '<div class="typing-dot"></div><div class="typing-dot"></div><div class="typing-dot"></div>';
        indicator.setAttribute('aria-label', `${BOT_NAME} sedang mengetik`);

        row.appendChild(avatar);
        row.appendChild(indicator);
        chatBody.appendChild(row);
        scrollToBottom();
        return row;
    }

    function removeTyping() {
        const el = document.getElementById('cb-typing-indicator');
        if (el) el.remove();
    }

    // ----------------------------------------------------------------
    // Date separator
    // ----------------------------------------------------------------
    function addDateSeparator(label) {
        const sep = document.createElement('div');
        sep.className = 'msg-date-sep';
        sep.textContent = label;
        sep.dataset.dateLabel = label;
        chatBody.appendChild(sep);
    }

    // ----------------------------------------------------------------
    // Send message
    // ----------------------------------------------------------------
    async function sendMessage() {
        const message = chatInput.value.trim();
        if (!message) return;

        chatInput.value = '';
        chatInput.style.height = 'auto';
        sendBtn.disabled = true;

        // Hide suggestions on first message
        const suggEl = document.getElementById('chat-suggestions');
        if (suggEl) suggEl.style.display = 'none';

        addMessage(escapeHtml(message), 'user');

        const typingRow = showTyping();

        try {
            const res = await fetch('/chatbot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CSRF,
                },
                body: JSON.stringify({ message }),
            });

            removeTyping();

            if (!res.ok) throw new Error(`HTTP ${res.status}`);

            const data = await res.json();
            addMessage(data.answer ?? 'Maaf, terjadi kesalahan.', 'bot', data.button ?? null);

        } catch (err) {
            removeTyping();
            addMessage('⚠️ Gagal terhubung ke server. Silakan coba lagi.', 'bot');
        }

        sendBtn.disabled = false;
        chatInput.focus();
    }

    // ----------------------------------------------------------------
    // Escape HTML (for user text safety)
    // ----------------------------------------------------------------
    function escapeHtml(text) {
        return text
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    // ----------------------------------------------------------------
    // Persistence (localStorage) — stores structured JSON, NOT raw innerHTML
    // ----------------------------------------------------------------
    function saveChat() {
        try {
            const entries = [];
            chatBody.childNodes.forEach(node => {
                if (node.nodeType !== Node.ELEMENT_NODE) return;
                if (node.classList.contains('msg-date-sep')) {
                    entries.push({ type: 'date', label: node.dataset.dateLabel || node.textContent });
                } else if (node.classList.contains('msg-row')) {
                    const bubble = node.querySelector('.msg-bubble');
                    entries.push({
                        type    : 'message',
                        sender  : node.dataset.sender || (node.classList.contains('bot-row') ? 'bot' : 'user'),
                        content : bubble ? (bubble.dataset.rawContent || '') : '',
                        time    : node.dataset.time || '',
                        btnUrl  : node.dataset.btnUrl  || null,
                        btnText : node.dataset.btnText || null,
                    });
                }
            });
            localStorage.setItem(STORAGE_KEY, JSON.stringify(entries));
        } catch(e) {}
    }

    function loadChat() {
        try {
            const raw = localStorage.getItem(STORAGE_KEY);
            if (!raw) return false;
            const entries = JSON.parse(raw);
            if (!Array.isArray(entries) || entries.length === 0) return false;
            entries.forEach(entry => {
                if (entry.type === 'date') {
                    addDateSeparator(entry.label);
                } else if (entry.type === 'message') {
                    const btn = (entry.btnUrl && entry.btnText)
                        ? { url: entry.btnUrl, text: entry.btnText }
                        : null;
                    const row = buildMessageRow(entry.content, entry.sender, entry.time, btn);
                    chatBody.appendChild(row);
                }
            });
            return true;
        } catch(e) {
            localStorage.removeItem(STORAGE_KEY);
        }
        return false;
    }

    // ----------------------------------------------------------------
    // Welcome message
    // ----------------------------------------------------------------
    function showWelcomeMessage() {
        addDateSeparator(todayLabel());
        addMessage(
            `Halo! 👋 Selamat datang di <strong>Website PORPROV Jabar XV</strong>.<br><br>` +
            `Saya <strong>RAJA PORPROV</strong>, asisten virtual Anda. Tanyakan apa saja seputar:<br>` +
            `📍 Lokasi Venue &nbsp;·&nbsp; 🏅 Cabang Olahraga &nbsp;·&nbsp; 🏨 Hotel Terdekat &nbsp;·&nbsp; 🗺️ Google Maps`,
            'bot'
        );
    }

    // ----------------------------------------------------------------
    // Auto-resize textarea
    // ----------------------------------------------------------------
    chatInput.addEventListener('input', () => {
        chatInput.style.height = 'auto';
        chatInput.style.height = Math.min(chatInput.scrollHeight, 120) + 'px';
    });

    // ----------------------------------------------------------------
    // Events
    // ----------------------------------------------------------------
    sendBtn.addEventListener('click', sendMessage);

    chatInput.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });

    // Suggestion chips
    suggestions.forEach(chip => {
        chip.addEventListener('click', () => {
            chatInput.value = chip.dataset.msg;
            if (!isOpen) openChat();
            sendMessage();
        });
    });

    // ----------------------------------------------------------------
    // Init
    // ----------------------------------------------------------------
    const historyLoaded = loadChat();
    if (!historyLoaded) {
        showWelcomeMessage();
    }

    // Restore scroll
    chatBody.scrollTop = chatBody.scrollHeight;

})();