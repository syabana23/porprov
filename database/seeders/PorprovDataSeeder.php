<?php

namespace Database\Seeders;

use App\Models\Contingent;
use App\Models\District;
use App\Models\Facility;
use App\Models\Schedule;
use App\Models\Sport;
use App\Models\Standing;
use App\Models\Venue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PorprovDataSeeder extends Seeder
{
    public function run(): void
    {
        // ============ SEED VENUES (13 venues) ============
        $venues = [
            ["name"=>"GOR Pajajaran Indoor A","slug"=>"gor-pajajaran-indoor-a","address"=>"GOR Pajajaran, Jl. Pemuda No.02, RT.04/RW.01, Tanah Sareal, Kota Bogor, Jawa Barat 16161","gmaps_url"=>"https://maps.app.goo.gl/KcwQDC2JxcTsj1LJ8","latitude"=>-6.575816698132383,"longitude"=>106.796958655819,"max_stops"=>9],
            ["name"=>"GOR Pajajaran Indoor B","slug"=>"gor-pajajaran-indoor-b","address"=>"GOR Pajajaran, Jl. Pemuda No.02, RT.04/RW.01, Tanah Sareal, Kota Bogor, Jawa Barat 16161","gmaps_url"=>"https://maps.app.goo.gl/h3ei411WRSdW5Uuf8","latitude"=>-6.577928206784957,"longitude"=>106.79690799953588,"max_stops"=>7],
            ["name"=>"GOR Vokasi IPB","slug"=>"gor-vokasi-ipb","address"=>"Jl. Lodaya II, RT.03/RW.05, Cilibende, Babakan, Kec. Bogor Tengah, Kota Bogor, Jawa Barat 16128","gmaps_url"=>"https://maps.app.goo.gl/ekjekDk57iBAQcTVA","latitude"=>-6.586864818074109,"longitude"=>106.80744643623193,"max_stops"=>9],
            ["name"=>"Majalengka","slug"=>"majalengka","address"=>"Majalengka, Jawa Barat","gmaps_url"=>"https://maps.google.com/?q=Majalengka","latitude"=>-6.836580168091458,"longitude"=>108.22805804110702,"max_stops"=>null],
            ["name"=>"Gunung Mas (Cisarua)","slug"=>"gunung-mas-cisarua","address"=>"Jl. Raya Puncak KM 87, Tugu Selatan, Cisarua, Kab. Bogor","gmaps_url"=>"https://www.google.com/maps/search/?api=1&query=Agrowisata+Gunung+Mas+Cisarua","latitude"=>-6.7010382,"longitude"=>106.9694386,"max_stops"=>3],
            ["name"=>"Green Forest Hotel","slug"=>"green-forest-hotel","address"=>"Bogor, Jawa Barat","gmaps_url"=>"https://maps.app.goo.gl/dgb7WBjKovkcfyLo9","latitude"=>-6.64930420834099,"longitude"=>106.806161644181,"max_stops"=>7],
            ["name"=>"Sport Center IPB Dramaga","slug"=>"sport-center-ipb-dramaga","address"=>"Sport Center, Jl. Raya Dramaga, Babakan, Kec. Dramaga, Kabupaten Bogor, Jawa Barat","gmaps_url"=>"https://www.google.com/maps/place/Sport+Center/@-6.5858263,106.7317778,17z","latitude"=>-6.5858263,"longitude"=>106.7317778,"max_stops"=>null],
            ["name"=>"Padepokan Voli Sentul","slug"=>"padepokan-voli-sentul","address"=>"Sentul, Bogor, Jawa Barat","gmaps_url"=>"https://maps.app.goo.gl/cXPfu5acX62py9QY9","latitude"=>-6.571855570792679,"longitude"=>106.8607669981466,"max_stops"=>7],
            ["name"=>"Arcamanik","slug"=>"arcamanik","address"=>"Sport Jabar Arcamanik, Bandung, Jawa Barat","gmaps_url"=>"https://maps.google.com/?q=Sport+Jabar+Arcamanik","latitude"=>-6.911153350109742,"longitude"=>107.67487895150336,"max_stops"=>null],
            ["name"=>"Cisangkan","slug"=>"cisangan","address"=>"Lapang Tembak Cisangkan, Cimahi, Jawa Barat","gmaps_url"=>"https://maps.google.com/?q=Lapang+Tembak+Cisangan","latitude"=>-6.8746820367318255,"longitude"=>107.52764243801157,"max_stops"=>null],
            ["name"=>"Stadion Pajajaran","slug"=>"stadion-pajajaran","address"=>"Stadion Pajajaran, Jl. Pemuda No.02, Kota Bogor","gmaps_url"=>"https://maps.app.goo.gl/HgsrKKn8LD9V792UA","latitude"=>-6.5770496557407565,"longitude"=>106.79707946745701,"max_stops"=>null],
            ["name"=>"Kota Baru Parahyangan","slug"=>"kota-baru-parahyangan","address"=>"Padalarang, Kabupaten Bandung Barat, Jawa Barat","gmaps_url"=>"https://maps.google.com/?q=Kota+Baru+Parahyangan","latitude"=>-6.85872946272341,"longitude"=>107.4845999774748,"max_stops"=>null],
            ["name"=>"GOR Yasmin","slug"=>"gor-yasmin","address"=>"Bogor, Jawa Barat","gmaps_url"=>"https://maps.app.goo.gl/Fqw4Yn97RyvkSeg27","latitude"=>-6.5669771863684225,"longitude"=>106.77129339999999,"max_stops"=>9],
        ];

        foreach ($venues as $v) {
            Venue::updateOrCreate(["slug"=>$v["slug"]], [
                "name"=>$v["name"],
                "slug"=>$v["slug"],
                "address"=>$v["address"]??null,
                "latitude"=>$v["latitude"]??null,
                "longitude"=>$v["longitude"]??null,
                "gmaps_url"=>$v["gmaps_url"]??null,
                "max_stops"=>$v["max_stops"]??null,
                "is_active"=>true,
            ]);
        }

        // ============ SEED CONTINGENTS (14 contingents) ============
        $contingents = [
            ["name"=>"Kota Bogor","slug"=>"kota-bogor","type"=>"kota","logo"=>"images/kota-bogor.png"],
            ["name"=>"Kota Bekasi","slug"=>"kota-bekasi","type"=>"kota","logo"=>"images/kota-bekasi.png"],
            ["name"=>"Kota Depok","slug"=>"kota-depok","type"=>"kota","logo"=>"images/kota-depok.png"],
            ["name"=>"Kota Bandung","slug"=>"kota-bandung","type"=>"kota","logo"=>"images/kota-bandung.png"],
            ["name"=>"Kota Cimahi","slug"=>"kota-cimahi","type"=>"kota","logo"=>"images/kota-cimahi.png"],
            ["name"=>"Kota Cirebon","slug"=>"kota-cirebon","type"=>"kota","logo"=>"images/kota-cirebon.png"],
            ["name"=>"Kota Sukabumi","slug"=>"kota-sukabumi","type"=>"kota","logo"=>"images/kota-sukabumi.png"],
            ["name"=>"Kota Tasikmalaya","slug"=>"kota-tasikmalaya","type"=>"kota","logo"=>"images/kota-tasikmalaya.png"],
            ["name"=>"Kabupaten Bogor","slug"=>"kab-bogor","type"=>"kabupaten","logo"=>"images/kab-bogor.png"],
            ["name"=>"Kabupaten Cianjur","slug"=>"kab-cianjur","type"=>"kabupaten","logo"=>"images/kab-cianjur.png"],
            ["name"=>"Kabupaten Ciamis","slug"=>"kab-ciamis","type"=>"kabupaten","logo"=>"images/kab-ciamis.png"],
            ["name"=>"Kabupaten Garut","slug"=>"kab-garut","type"=>"kabupaten","logo"=>"images/kab-garut.png"],
            ["name"=>"Kabupaten Karawang","slug"=>"kab-karawang","type"=>"kabupaten","logo"=>"images/kab-karawang.png"],
            ["name"=>"Kabupaten Sumedang","slug"=>"kab-sumedang","type"=>"kabupaten","logo"=>"images/kab-sumedang.png"],
        ];

        foreach ($contingents as $c) {
            Contingent::updateOrCreate(["slug"=>$c["slug"]], [
                "name"=>$c["name"],
                "slug"=>$c["slug"],
                "logo"=>$c["logo"] ?? "images/default-kontingen.png",
                "type"=>$c["type"] ?? "kota",
                "is_active"=>true,
            ]);
        }

        // ============ SEED STANDINGS (14 standings) ============
        foreach (Contingent::all() as $contingent) {
            Standing::updateOrCreate(
                ["contingent_id"=>$contingent->id],
                ["contingent_id"=>$contingent->id,"gold"=>0,"silver"=>0,"bronze"=>0,"total"=>0,"rank"=>null]
            );
        }

        // ============ SEED SPORTS (28 sports) ============
        $sports = [
            ["name"=>"Drumband","slug"=>"drumband","venue"=>"GOR Pajajaran Indoor A","logo"=>"images/cabor/24.DRUM BAND.png"],
            ["name"=>"Pencak Silat","slug"=>"pencak-silat","venue"=>"GOR Pajajaran Indoor A","logo"=>"images/cabor/12.PENCAK SILAT.png"],
            ["name"=>"Taekwondo","slug"=>"taekwondo","venue"=>"GOR Pajajaran Indoor A","logo"=>"images/cabor/9.TAEKWONDO.png"],
            ["name"=>"Judo","slug"=>"judo","venue"=>"GOR Pajajaran Indoor B","logo"=>"images/cabor/25.JUDO.png"],
            ["name"=>"Kurash","slug"=>"kurash","venue"=>"GOR Pajajaran Indoor B","logo"=>"images/cabor/18.KURASH.png"],
            ["name"=>"Sambo","slug"=>"sambo","venue"=>"GOR Pajajaran Indoor B","logo"=>"images/cabor/17.SAMBO.png"],
            ["name"=>"Shorinji Kempo","slug"=>"shorinji-kempo","venue"=>"GOR Vokasi IPB","logo"=>"images/cabor/15.KEMPO.png"],
            ["name"=>"Tarung Derajat","slug"=>"tarung-derajat","venue"=>"GOR Vokasi IPB","logo"=>"images/cabor/19.TARUNG DERAJAT.png"],
            ["name"=>"Aerosport - Gantolle","slug"=>"aerosport-gantolle","venue"=>"Majalengka","logo"=>"images/cabor/14.GANTOLE.png"],
            ["name"=>"Aerosport - Paralayang","slug"=>"aerosport-paralayang","venue"=>"Gunung Mas (Cisarua)","logo"=>"images/cabor/3.PARALAYANG.png"],
            ["name"=>"Anggar","slug"=>"anggar","venue"=>"Green Forest Hotel","logo"=>"images/cabor/2.ANGGAR.png"],
            ["name"=>"Angkat Besi","slug"=>"angkat-besi","venue"=>"Green Forest Hotel","logo"=>"images/cabor/10.ANGKAT BESI.png"],
            ["name"=>"Angkat Berat","slug"=>"angkat-berat","venue"=>"Green Forest Hotel","logo"=>"images/cabor/20.ANGKAT BERAT.png"],
            ["name"=>"Arung Jeram","slug"=>"arung-jeram","venue"=>"Green Forest Hotel","logo"=>"images/cabor/13.ARUNG JERAM.png"],
            ["name"=>"Binaraga","slug"=>"binaraga","venue"=>"Green Forest Hotel","logo"=>"images/cabor/6.BINARAGA.png"],
            ["name"=>"Dansa","slug"=>"dansa","venue"=>"Green Forest Hotel","logo"=>"images/cabor/27.DANSA.png"],
            ["name"=>"Petanque","slug"=>"petanque","venue"=>"Green Forest Hotel","logo"=>"images/cabor/16.PENTAQUE.png"],
            ["name"=>"Bola Tangan Indoor","slug"=>"bola-tangan-indoor","venue"=>"Sport Center IPB Dramaga","logo"=>"images/cabor/11.BOLA TANGAN.png"],
            ["name"=>"Bola Tangan Pasir","slug"=>"bola-tangan-pasir","venue"=>"Padepokan Voli Sentul","logo"=>"images/cabor/11.BOLA TANGAN.png"],
            ["name"=>"Gimnastik Aerobik","slug"=>"gimnastik-aerobik","venue"=>"Arcamanik","logo"=>"images/cabor/21.SENAM.png"],
            ["name"=>"Gimnastik Artistik","slug"=>"gimnastik-artistik","venue"=>"Arcamanik","logo"=>"images/cabor/21.SENAM.png"],
            ["name"=>"Gimnastik Ritmik","slug"=>"gimnastik-ritmik","venue"=>"Arcamanik","logo"=>"images/cabor/21.SENAM.png"],
            ["name"=>"Menembak","slug"=>"menembak","venue"=>"Cisangkan","logo"=>"images/cabor/7.MENEMBAK.png"],
            ["name"=>"Modern Pentathlon","slug"=>"modern-pentathlon","venue"=>"Stadion Pajajaran","logo"=>"images/cabor/26.MODERN PENTATHLON.png"],
            ["name"=>"Panahan","slug"=>"panahan","venue"=>"Stadion Pajajaran","logo"=>"images/cabor/5.PANAHAN.png"],
            ["name"=>"Panjat Tebing","slug"=>"panjat-tebing","venue"=>"Stadion Pajajaran","logo"=>"images/cabor/23.PANJAT TEBING.png"],
            ["name"=>"Ski Air","slug"=>"ski-air","venue"=>"Kota Baru Parahyangan","logo"=>"images/cabor/22.SKI AIR.png"],
            ["name"=>"Tenis Meja","slug"=>"tenis-meja","venue"=>"GOR Yasmin","logo"=>"images/cabor/8.TENIS MEJA.png"],
        ];

        foreach ($sports as $s) {
            $v = Venue::where("name",$s["venue"])->first();
            Sport::updateOrCreate(["slug"=>$s["slug"]], [
                "name"=>$s["name"],
                "slug"=>$s["slug"],
                "logo"=>$s["logo"] ?? null,
                "venue_id"=>$v?->id,
                "is_active"=>true,
            ]);
        }

        // ============ SEED DISTRICTS (6 Kecamatan Kota Bogor) ============
        $districts = ['Bogor Barat', 'Bogor Selatan', 'Bogor Tengah', 'Bogor Timur', 'Bogor Utara', 'Tanah Sareal'];
        foreach ($districts as $d) {
            District::updateOrCreate(['name' => $d], ['name' => $d]);
        }

        // ============ SEED FACILITIES (107 facilities dari routes/web.php) ============
        // ============ SEED FACILITIES (107 full facilities) ============
        $this->call(FacilitySeeder::class);

        // ============ SEED SCHEDULES (Initial real matches) ============
        $kotabogor = Contingent::where('slug', 'kota-bogor')->first();
        $kotabandung = Contingent::where('slug', 'kota-bandung')->first();
        $kotabekasi = Contingent::where('slug', 'kota-bekasi')->first();
        $kabbogor = Contingent::where('slug', 'kab-bogor')->first();

        $initialSchedules = [
            [
                'match_title' => 'Kualifikasi & Final Panahan',
                'sport' => 'Panahan',
                'venue' => 'Stadion Pajajaran',
                'category' => 'Recurve & Compound',
                'match_date' => '2026-10-31',
                'start_time' => '08:00',
                'end_time' => '17:00',
                'status' => 'upcoming',
                'contingent_id' => $kotabogor?->id,
                'opponent_contingent_id' => $kotabandung?->id,
            ],
            [
                'match_title' => 'Babak Penyisihan & Final Pencak Silat',
                'sport' => 'Pencak Silat',
                'venue' => 'GOR Pajajaran Indoor A',
                'category' => 'Tanding & Seni Putra/Putri',
                'match_date' => '2026-11-02',
                'start_time' => '09:00',
                'end_time' => '18:00',
                'status' => 'upcoming',
                'contingent_id' => $kotabogor?->id,
                'opponent_contingent_id' => $kotabekasi?->id,
            ],
            [
                'match_title' => 'Pertandingan Judo',
                'sport' => 'Judo',
                'venue' => 'GOR Pajajaran Indoor B',
                'category' => 'Kelas -60kg & -66kg',
                'match_date' => '2026-11-03',
                'start_time' => '08:30',
                'end_time' => '16:00',
                'status' => 'upcoming',
                'contingent_id' => $kabbogor?->id,
                'opponent_contingent_id' => $kotabandung?->id,
            ],
            [
                'match_title' => 'Penyisihan & Final Taekwondo',
                'sport' => 'Taekwondo',
                'venue' => 'GOR Pajajaran Indoor A',
                'category' => 'Kyorugi & Poomsae',
                'match_date' => '2026-11-04',
                'start_time' => '09:00',
                'end_time' => '17:30',
                'status' => 'upcoming',
                'contingent_id' => $kotabogor?->id,
                'opponent_contingent_id' => $kabbogor?->id,
            ],
            [
                'match_title' => 'Lomba Baris Berbaris Drumband',
                'sport' => 'Drumband',
                'venue' => 'GOR Pajajaran Indoor A',
                'category' => 'LBB & LUG Beregu',
                'match_date' => '2026-11-01',
                'start_time' => '08:00',
                'end_time' => '15:00',
                'status' => 'upcoming',
                'contingent_id' => $kotabogor?->id,
                'opponent_contingent_id' => null,
            ],
            [
                'match_title' => 'Kejuaraan Sambo',
                'sport' => 'Sambo',
                'venue' => 'GOR Pajajaran Indoor B',
                'category' => 'Sport Sambo & Combat Sambo',
                'match_date' => '2026-11-05',
                'start_time' => '09:00',
                'end_time' => '17:00',
                'status' => 'upcoming',
                'contingent_id' => $kotabekasi?->id,
                'opponent_contingent_id' => $kotabandung?->id,
            ],
        ];

        foreach ($initialSchedules as $sch) {
            $sportModel = Sport::where('name', $sch['sport'])->first();
            $venueModel = Venue::where('name', $sch['venue'])->first();

            Schedule::updateOrCreate(
                [
                    'match_title' => $sch['match_title'],
                    'match_date' => $sch['match_date'],
                ],
                [
                    'sport_id' => $sportModel?->id,
                    'venue_id' => $venueModel?->id,
                    'category' => $sch['category'],
                    'start_time' => $sch['start_time'],
                    'end_time' => $sch['end_time'],
                    'status' => $sch['status'],
                    'contingent_id' => $sch['contingent_id'],
                    'opponent_contingent_id' => $sch['opponent_contingent_id'],
                ]
            );
        }
    }
}