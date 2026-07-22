const rows = [
  { no: 1, sport: 'Aerosport - Gantolle', venue: 'Majalengka', durasi: 13, c: [6,7], r: [8,9,10,11,12,13,14,15,16,17], p: [18] },
  { no: 2, sport: 'Aerosport - Paralayang', venue: 'Gunung Mas', durasi: 14, c: [7,8], r: [9,10,11,12,13,14,15,16,17,18], p: [19] },
  { no: 3, sport: 'Anggar', venue: 'Green Forest Hotel', durasi: 9, c: [5,6], r: [7,8,9,10,11,12], p: [13] },
  { no: 4, sport: 'Angkat Berat', venue: 'Green Forest Hotel', durasi: 7, c: [11,12], r: [13,14,15,16], p: [17] },
  { no: 5, sport: 'Angkat Besi', venue: 'Green Forest Hotel', durasi: 7, c: [5,6], r: [7,8,9,10], p: [11] },
  { no: 6, sport: 'Arung Jeram', venue: 'Green Forest Hotel', durasi: 12, c: [8,9], r: [10,11,12,13,14,15,16,17,18], p: [19] },
  { no: 7, sport: 'Binaraga', venue: 'Green Forest Hotel', durasi: 5, c: [16,17], r: [18,19], p: [20] },
  { no: 8, sport: 'Bola Tangan Indoor', venue: 'PPSDMAP Kemenhub Kemang', durasi: 9, c: [8,9], r: [10,11,12,13,14,15], p: [16] },
  { no: 9, sport: 'Bola Tangan Pasir', venue: 'Padepokan Voli Sentul', durasi: 7, c: [], r: [14,15,16,17,18,19], p: [20] },
  { no: 10, sport: 'Dansa', venue: 'Brajamustika Hotel', durasi: 6, c: [10,11], r: [12,13,14], p: [15] },
  { no: 11, sport: 'Drumband', venue: 'Indoor A GOR Pajajaran', durasi: 10, c: [7,8], r: [9,10,11,12,13,14,15], p: [16] },
  { no: 12, sport: 'Gimnastik Aerobik', venue: 'Arcamanik', durasi: 5, c: [15,16], r: [17,18], p: [19] },
  { no: 13, sport: 'Gimnastik Artistik', venue: 'Arcamanik', durasi: 6, c: [9,10], r: [11,12,13], p: [14] },
  { no: 14, sport: 'Gimnastik Ritmik', venue: 'Arcamanik', durasi: 6, c: [12,13], r: [14,15,16], p: [17] },
  { no: 15, sport: 'Judo', venue: 'Indoor B GOR Pajajaran', durasi: 8, c: [3,4], r: [5,6,7,8,9], p: [10] },
  { no: 16, sport: 'Kurash', venue: 'Indoor B GOR Pajajaran', durasi: 6, c: [9,10], r: [11,12,13], p: [14] },
  { no: 17, sport: 'Menembak', venue: 'Cisangkan', durasi: 11, c: [6,7], r: [8,9,10,11,12,13,14,15], p: [16] },
  { no: 18, sport: 'Modern Pentathlon', venue: 'Stadion Pajajaran', durasi: 11, c: [10,11], r: [12,13,14,15,16,17,18,19], p: [20] },
  { no: 19, sport: 'Panahan', venue: 'Stadion Pajajaran', durasi: 12, c: [31,1], r: [2,3,4,5,6,7,8,9,10], p: [11] },
  { no: 20, sport: 'Panjat Tebing', venue: 'Stadion Pajajaran', durasi: 15, c: [5,6], r: [7,8,9,10,11,12,13,14,15,16,17,18], p: [19] },
  { no: 21, sport: 'Pencak Silat', venue: 'Indoor A GOR Pajajaran', durasi: 8, c: [2,3], r: [4,5,6,7,8], p: [9] },
  { no: 22, sport: 'Petanque', venue: 'Green Forest Hotel', durasi: 9, c: [5,6], r: [7,8,9,10,11,12], p: [13] },
  { no: 23, sport: 'Sambo', venue: 'Indoor B GOR Pajajaran', durasi: 7, c: [13,14], r: [15,16,17,18], p: [19] },
  { no: 24, sport: 'Shorinji Kempo', venue: 'GOR Fokasi IPB', durasi: 7, c: [2,3], r: [4,5,6,7], p: [8] },
  { no: 25, sport: 'Ski Air', venue: 'Kota Baru Parahyangan', durasi: 9, c: [8,9], r: [10,11,12,13,14,15], p: [16] },
  { no: 26, sport: 'Taekwondo', venue: 'Indoor A GOR Pajajaran', durasi: 9, c: [11,12], r: [13,14,15,16,17,18], p: [19] },
  { no: 27, sport: 'Tarung Derajat', venue: 'GOR Fokasi IPB', durasi: 8, c: [13,14], r: [15,16,17,18,19], p: [20] },
  { no: 28, sport: 'Tenis Meja', venue: 'GOR Yasmin', durasi: 12, c: [6,7], r: [8,9,10,11,12,13,14,15,16], p: [17] },
];
const dates = [31, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
let html = '';
for (const row of rows) {
  html += '                <tr>\n';
  html += '                    <td class="no">' + row.no + '</td>\n';
  html += '                    <td class="sport" data-sport="' + row.sport + '" data-venue="' + row.venue + '">' + row.sport + '</td>\n';
  html += '                    <td class="venue" data-sport="' + row.sport + '" data-venue="' + row.venue + '">' + row.venue + '</td>\n';
  html += '                    <td class="durasi">' + row.durasi + '</td>\n';
  for (const d of dates) {
    let spanClass = 'day-empty';
    if (row.c.includes(d)) spanClass = 'day-prep';
    else if (row.r.includes(d)) spanClass = 'day-exec';
    else if (row.p.includes(d)) spanClass = 'day-final';
    html += '                    <td class="day-cell"><span class="' + spanClass + '"></span></td>\n';
  }
  html += '                </tr>\n';
}
const fs = require('fs');
fs.writeFileSync('new_tbody.html', html);
