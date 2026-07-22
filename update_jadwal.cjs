const fs = require('fs');
let content = fs.readFileSync('resources/views/jadwal.blade.php', 'utf8');

// Replace table header
const newThead = `            <thead>
                <tr>
                    <th rowspan="2" style="width:36px">No</th>
                    <th rowspan="2">Cabang Olahraga</th>
                    <th rowspan="2">Venue</th>
                    <th rowspan="2" style="width:54px;text-align:center">Durasi</th>
                    <th colspan="1" style="background:#014590;text-align:center">Oktober</th>
                    <th colspan="20" style="background:#014590;text-align:center">November 2026</th>
                </tr>
                <tr class="month-header">
                    <th class="date-col">31<br>Sabtu</th>
                    <th class="date-col">1<br>Minggu</th>
                    <th class="date-col">2<br>Senin</th>
                    <th class="date-col">3<br>Selasa</th>
                    <th class="date-col">4<br>Rabu</th>
                    <th class="date-col">5<br>Kamis</th>
                    <th class="date-col">6<br>Jumat</th>
                    <th class="date-col">7<br>Sabtu</th>
                    <th class="date-col">8<br>Minggu</th>
                    <th class="date-col">9<br>Senin</th>
                    <th class="date-col">10<br>Selasa</th>
                    <th class="date-col">11<br>Rabu</th>
                    <th class="date-col">12<br>Kamis</th>
                    <th class="date-col">13<br>Jumat</th>
                    <th class="date-col">14<br>Sabtu</th>
                    <th class="date-col">15<br>Minggu</th>
                    <th class="date-col">16<br>Senin</th>
                    <th class="date-col">17<br>Selasa</th>
                    <th class="date-col">18<br>Rabu</th>
                    <th class="date-col">19<br>Kamis</th>
                    <th class="date-col">20<br>Jumat</th>
                </tr>
            </thead>`;

content = content.replace(/            <thead>[\s\S]*?<\/thead>/, newThead);

// Replace tbody
const newTbodyContent = fs.readFileSync('new_tbody.html', 'utf8');
content = content.replace(/            <tbody>[\s\S]*?<\/tbody>/, '            <tbody>\n' + newTbodyContent + '            </tbody>');

// Replace dateFilter
const newDateFilter = `            <select id="dateFilter">
                <option value="all">Semua Tanggal</option>
                <option value="4" data-month="oktober">31 Oktober</option>
                <option value="5" data-month="november">1 November</option>
                <option value="6" data-month="november">2 November</option>
                <option value="7" data-month="november">3 November</option>
                <option value="8" data-month="november">4 November</option>
                <option value="9" data-month="november">5 November</option>
                <option value="10" data-month="november">6 November</option>
                <option value="11" data-month="november">7 November</option>
                <option value="12" data-month="november">8 November</option>
                <option value="13" data-month="november">9 November</option>
                <option value="14" data-month="november">10 November</option>
                <option value="15" data-month="november">11 November</option>
                <option value="16" data-month="november">12 November</option>
                <option value="17" data-month="november">13 November</option>
                <option value="18" data-month="november">14 November</option>
                <option value="19" data-month="november">15 November</option>
                <option value="20" data-month="november">16 November</option>
                <option value="21" data-month="november">17 November</option>
                <option value="22" data-month="november">18 November</option>
                <option value="23" data-month="november">19 November</option>
                <option value="24" data-month="november">20 November</option>
            </select>`;

content = content.replace(/            <select id="dateFilter">[\s\S]*?<\/select>/, newDateFilter);

fs.writeFileSync('resources/views/jadwal.blade.php', content);
console.log('Update complete');
