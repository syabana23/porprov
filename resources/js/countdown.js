// Floating Countdown Widget (alá porprovbekasikota2026.id)
document.addEventListener('DOMContentLoaded', () => {
    const wrap = document.getElementById('pcdCountdown');
    if (!wrap) return;

    const card = document.getElementById('pcdCard');
    const drag = document.getElementById('pcdDrag');
    const toggle = document.getElementById('pcdToggle');
    const timer = document.getElementById('pcdTimer');
    const done = document.getElementById('pcdDone');

    // ── Ticker ──
    const groups = [
        { sel: '.pcd-days', len: 3 },
        { sel: '.pcd-hours', len: 2 },
        { sel: '.pcd-minutes', len: 2 },
        { sel: '.pcd-seconds', len: 2 },
    ];

    function setDigits(sel, str) {
        const els = document.querySelectorAll(sel);
        els.forEach((el, i) => {
            el.textContent = i < str.length ? str[i] : '0';
        });
    }

    function tick() {
        const now = new Date();
        let target = new Date('2026-11-07T00:00:00+07:00');
        if (now > target) {
            target = new Date(now.getFullYear(), 10, 7, 0, 0, 0);
            if (now > target) {
                target = new Date(now.getFullYear() + 1, 10, 7, 0, 0, 0);
            }
        }

        const diff = target.getTime() - now.getTime();
        if (diff <= 0) {
            groups.forEach(g => setDigits(g.sel, '0'.repeat(g.len)));
            timer.style.display = 'none';
            done.hidden = false;
            return;
        }

        const d = Math.floor(diff / 86400000);
        const h = Math.floor((diff % 86400000) / 3600000);
        const m = Math.floor((diff % 3600000) / 60000);
        const s = Math.floor((diff % 60000) / 1000);

        const values = [
            String(d).padStart(3, '0'),
            String(h).padStart(2, '0'),
            String(m).padStart(2, '0'),
            String(s).padStart(2, '0'),
        ];
        groups.forEach((g, i) => setDigits(g.sel, values[i]));
    }

    tick();
    setInterval(tick, 1000);

    // ── Buka / Tutup ──
    function setCollapsed(v) {
        card.classList.toggle('pcd-collapsed', v);
        toggle.textContent = v ? 'Buka' : 'Tutup';
        toggle.setAttribute('aria-expanded', String(!v));
        toggle.setAttribute('aria-label', v ? 'Buka countdown' : 'Tutup countdown');
        localStorage.setItem('pcd_collapsed', v ? '1' : '0');
    }

    if (localStorage.getItem('pcd_collapsed') === '1') {
        setCollapsed(true);
    }

    toggle.addEventListener('click', () => {
        setCollapsed(!card.classList.contains('pcd-collapsed'));
    });

    // ── Drag ──
    const MIN_X = 16;
    const MIN_Y = 16;
    let dragging = null;

    drag.addEventListener('pointerdown', (e) => {
        if (e.target.closest('[data-no-drag="true"]')) return;
        const rect = card.getBoundingClientRect();
        dragging = {
            id: e.pointerId,
            dx: e.clientX - rect.left,
            dy: e.clientY - rect.top,
        };
        drag.setPointerCapture(e.pointerId);
        card.classList.add('pcd-grabbing');
    });

    drag.addEventListener('pointermove', (e) => {
        if (!dragging || dragging.id !== e.pointerId) return;
        const rect = card.getBoundingClientRect();
        const maxX = Math.max(MIN_X, window.innerWidth - rect.width - MIN_X);
        const maxY = Math.max(MIN_Y, window.innerHeight - rect.height - MIN_Y);
        const left = Math.min(maxX, Math.max(MIN_X, e.clientX - dragging.dx));
        const top = Math.min(maxY, Math.max(MIN_Y, e.clientY - dragging.dy));
        card.style.left = left + 'px';
        card.style.top = top + 'px';
        card.style.bottom = 'auto';
    });

    function endDrag(e) {
        if (dragging && dragging.id === e.pointerId) {
            dragging = null;
            card.classList.remove('pcd-grabbing');
        }
    }

    drag.addEventListener('pointerup', endDrag);
    drag.addEventListener('pointercancel', endDrag);

    wrap.hidden = false;
});
