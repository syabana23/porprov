const fs = require('fs');
let content = fs.readFileSync('resources/views/jadwal.blade.php', 'utf8');

// Update inline styles in the table header
content = content.replace(/<th colspan="1" style="background:#014590;text-align:center">/g, '<th colspan="1" style="text-align:center">');
content = content.replace(/<th colspan="20" style="background:#014590;text-align:center">/g, '<th colspan="20" style="text-align:center">');

// Replace CSS
const oldCss = `    /* ── Table ── */
    .jadwal-table-wrap {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.09);
        overflow: auto;
        margin-bottom: 28px;
    }

    .jadwal-tbl {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
        min-width: 850px;
    }

    .jadwal-tbl thead {
        background: #013469;
        color: #fff;
    }

    .jadwal-tbl thead th {
        padding: 10px 12px;
        text-align: left;
        font-weight: 600;
        font-size: 11.5px;
        border-right: 1px solid rgba(255, 255, 255, 0.15);
        white-space: nowrap;
    }

    .jadwal-tbl thead th.date-col {
        text-align: center;
        font-size: 10px;
        padding: 6px 8px;
    }

    .jadwal-tbl thead .month-header th {
        background: #014590;
        font-size: 10px;
        text-align: center;
        letter-spacing: 0.04em;
    }

    .jadwal-tbl tbody tr {
        border-bottom: 1px solid #e5e7eb;
    }

    .jadwal-tbl tbody tr:hover {
        background: #f8fafc;
    }

    .jadwal-tbl tbody td {
        padding: 9px 12px;
        color: #374151;
        font-size: 12px;
        border-right: 1px solid #e5e7eb;
    }

    .jadwal-tbl tbody td.no {
        text-align: center;
        font-weight: 700;
        color: #013469;
    }

    .jadwal-tbl tbody td.sport,
    .jadwal-tbl tbody td.venue {
        font-weight: 600;
        color: #013469;
        cursor: pointer;
        transition: all 0.2s;
    }

    .jadwal-tbl tbody td.sport:hover,
    .jadwal-tbl tbody td.venue:hover {
        text-decoration: underline;
        color: #FDB813;
    }

    .jadwal-tbl tbody td.durasi {
        text-align: center;
        font-weight: 600;
    }

    .jadwal-tbl tbody td.day-cell {
        padding: 0;
        height: 36px;
    }

    .day-prep {
        background: #60a5fa;
        width: 100%;
        height: 100%;
        display: block;
    }

    .day-exec {
        background: #fb923c;
        width: 100%;
        height: 100%;
        display: block;
    }

    .day-final {
        background: #c084fc;
        width: 100%;
        height: 100%;
        display: block;
    }

    .day-empty {
        width: 100%;
        height: 100%;
        display: block;
    }

    /* ── Bottom Layout ── */
    .jadwal-bottom {
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
    }

    /* ── Legend ── */
    .legend-box {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        padding: 20px;
        min-width: 240px;
        flex: 0 0 auto;
    }

    .legend-box h3 {
        font-size: 14px;
        font-weight: 800;
        color: #013469;
        margin: 0 0 16px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 14px;
    }

    .legend-dot {
        width: 42px;
        height: 22px;
        border-radius: 50px;
        flex-shrink: 0;
    }

    .legend-dot.prep {
        background: #60a5fa;
    }

    .legend-dot.exec {
        background: #fb923c;
    }

    .legend-dot.final {
        background: #c084fc;
    }`;

const newCss = `    /* ── Table ── */
    .jadwal-table-wrap {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #f1f5f9;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        overflow: auto;
        margin-bottom: 28px;
    }

    .jadwal-tbl {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
        min-width: 1000px;
    }

    .jadwal-tbl thead {
        background: #fff;
        color: #475569;
        border-bottom: 2px solid #e2e8f0;
    }

    .jadwal-tbl thead th {
        padding: 14px 12px;
        text-align: left;
        font-weight: 600;
        font-size: 12px;
        white-space: nowrap;
    }

    .jadwal-tbl thead th.date-col {
        text-align: center;
        font-size: 11px;
        padding: 8px 4px;
        color: #64748b;
        font-weight: 500;
    }

    .jadwal-tbl thead .month-header th {
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }

    .jadwal-tbl tbody tr {
        border-bottom: 1px solid #f1f5f9;
        transition: background 0.2s;
    }

    .jadwal-tbl tbody tr:hover {
        background: #f8fafc;
    }

    .jadwal-tbl tbody td {
        padding: 12px;
        color: #334155;
        font-size: 13px;
    }

    .jadwal-tbl tbody td.no {
        text-align: center;
        font-weight: 600;
        color: #94a3b8;
    }

    .jadwal-tbl tbody td.sport,
    .jadwal-tbl tbody td.venue {
        font-weight: 500;
        color: #1e293b;
        cursor: pointer;
        transition: all 0.2s;
    }

    .jadwal-tbl tbody td.sport:hover,
    .jadwal-tbl tbody td.venue:hover {
        color: #0ea5e9;
    }

    .jadwal-tbl tbody td.durasi {
        text-align: center;
        font-weight: 600;
        color: #64748b;
    }

    .jadwal-tbl tbody td.day-cell {
        padding: 0;
        height: 44px;
        vertical-align: middle;
    }

    .day-prep, .day-exec, .day-final {
        width: 100%;
        height: 12px;
        display: block;
    }

    .day-prep { background: #93c5fd; }
    .day-exec { background: #fdba74; }
    .day-final { background: #d8b4fe; }

    .day-empty {
        width: 100%;
        height: 100%;
        display: block;
    }

    /* ── Bottom Layout ── */
    .jadwal-bottom {
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
    }

    /* ── Legend ── */
    .legend-box {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #f1f5f9;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        padding: 24px;
        min-width: 240px;
        flex: 0 0 auto;
    }

    .legend-box h3 {
        font-size: 14px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 16px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 14px;
    }

    .legend-dot {
        width: 24px;
        height: 8px;
        border-radius: 4px;
        flex-shrink: 0;
    }

    .legend-dot.prep { background: #93c5fd; }
    .legend-dot.exec { background: #fdba74; }
    .legend-dot.final { background: #d8b4fe; }`;

content = content.replace(oldCss, newCss);
fs.writeFileSync('resources/views/jadwal.blade.php', content);
console.log('Update complete');
