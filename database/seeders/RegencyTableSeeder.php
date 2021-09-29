<?php

namespace Database\Seeders;

use App\Models\Regency;
use Illuminate\Database\Seeder;

class RegencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regencies = [
            [
                "id" => "1101",
                "province_id" => "11",
                "name" => "kabupaten simeulue",
            ],
            [
                "id" => "1102",
                "province_id" => "11",
                "name" => "kabupaten aceh singkil",
            ],
            [
                "id" => "1103",
                "province_id" => "11",
                "name" => "kabupaten aceh selatan",
            ],
            [
                "id" => "1104",
                "province_id" => "11",
                "name" => "kabupaten aceh tenggara",
            ],
            [
                "id" => "1105",
                "province_id" => "11",
                "name" => "kabupaten aceh timur",
            ],
            [
                "id" => "1106",
                "province_id" => "11",
                "name" => "kabupaten aceh tengah",
            ],
            [
                "id" => "1107",
                "province_id" => "11",
                "name" => "kabupaten aceh barat",
            ],
            [
                "id" => "1108",
                "province_id" => "11",
                "name" => "kabupaten aceh besar",
            ],
            [
                "id" => "1109",
                "province_id" => "11",
                "name" => "kabupaten pidie",
            ],
            [
                "id" => "1110",
                "province_id" => "11",
                "name" => "kabupaten bireuen",
            ],
            [
                "id" => "1111",
                "province_id" => "11",
                "name" => "kabupaten aceh utara",
            ],
            [
                "id" => "1112",
                "province_id" => "11",
                "name" => "kabupaten aceh barat daya",
            ],
            [
                "id" => "1113",
                "province_id" => "11",
                "name" => "kabupaten gayo lues",
            ],
            [
                "id" => "1114",
                "province_id" => "11",
                "name" => "kabupaten aceh tamiang",
            ],
            [
                "id" => "1115",
                "province_id" => "11",
                "name" => "kabupaten nagan raya",
            ],
            [
                "id" => "1116",
                "province_id" => "11",
                "name" => "kabupaten aceh jaya",
            ],
            [
                "id" => "1117",
                "province_id" => "11",
                "name" => "kabupaten bener meriah",
            ],
            [
                "id" => "1118",
                "province_id" => "11",
                "name" => "kabupaten pidie jaya",
            ],
            [
                "id" => "1171",
                "province_id" => "11",
                "name" => "kota banda aceh",
            ],
            [
                "id" => "1172",
                "province_id" => "11",
                "name" => "kota sabang",
            ],
            [
                "id" => "1173",
                "province_id" => "11",
                "name" => "kota langsa",
            ],
            [
                "id" => "1174",
                "province_id" => "11",
                "name" => "kota lhokseumawe",
            ],
            [
                "id" => "1175",
                "province_id" => "11",
                "name" => "kota subulussalam",
            ],
            [
                "id" => "1201",
                "province_id" => "12",
                "name" => "kabupaten nias",
            ],
            [
                "id" => "1202",
                "province_id" => "12",
                "name" => "kabupaten mandailing natal",
            ],
            [
                "id" => "1203",
                "province_id" => "12",
                "name" => "kabupaten tapanuli selatan",
            ],
            [
                "id" => "1204",
                "province_id" => "12",
                "name" => "kabupaten tapanuli tengah",
            ],
            [
                "id" => "1205",
                "province_id" => "12",
                "name" => "kabupaten tapanuli utara",
            ],
            [
                "id" => "1206",
                "province_id" => "12",
                "name" => "kabupaten toba samosir",
            ],
            [
                "id" => "1207",
                "province_id" => "12",
                "name" => "kabupaten labuhan batu",
            ],
            [
                "id" => "1208",
                "province_id" => "12",
                "name" => "kabupaten asahan",
            ],
            [
                "id" => "1209",
                "province_id" => "12",
                "name" => "kabupaten simalungun",
            ],
            [
                "id" => "1210",
                "province_id" => "12",
                "name" => "kabupaten dairi",
            ],
            [
                "id" => "1211",
                "province_id" => "12",
                "name" => "kabupaten karo",
            ],
            [
                "id" => "1212",
                "province_id" => "12",
                "name" => "kabupaten deli serdang",
            ],
            [
                "id" => "1213",
                "province_id" => "12",
                "name" => "kabupaten langkat",
            ],
            [
                "id" => "1214",
                "province_id" => "12",
                "name" => "kabupaten nias selatan",
            ],
            [
                "id" => "1215",
                "province_id" => "12",
                "name" => "kabupaten humbang hasundutan",
            ],
            [
                "id" => "1216",
                "province_id" => "12",
                "name" => "kabupaten pakpak bharat",
            ],
            [
                "id" => "1217",
                "province_id" => "12",
                "name" => "kabupaten samosir",
            ],
            [
                "id" => "1218",
                "province_id" => "12",
                "name" => "kabupaten serdang bedagai",
            ],
            [
                "id" => "1219",
                "province_id" => "12",
                "name" => "kabupaten batu bara",
            ],
            [
                "id" => "1220",
                "province_id" => "12",
                "name" => "kabupaten padang lawas utara",
            ],
            [
                "id" => "1221",
                "province_id" => "12",
                "name" => "kabupaten padang lawas",
            ],
            [
                "id" => "1222",
                "province_id" => "12",
                "name" => "kabupaten labuhan batu selatan",
            ],
            [
                "id" => "1223",
                "province_id" => "12",
                "name" => "kabupaten labuhan batu utara",
            ],
            [
                "id" => "1224",
                "province_id" => "12",
                "name" => "kabupaten nias utara",
            ],
            [
                "id" => "1225",
                "province_id" => "12",
                "name" => "kabupaten nias barat",
            ],
            [
                "id" => "1271",
                "province_id" => "12",
                "name" => "kota sibolga",
            ],
            [
                "id" => "1272",
                "province_id" => "12",
                "name" => "kota tanjung balai",
            ],
            [
                "id" => "1273",
                "province_id" => "12",
                "name" => "kota pematang siantar",
            ],
            [
                "id" => "1274",
                "province_id" => "12",
                "name" => "kota tebing tinggi",
            ],
            [
                "id" => "1275",
                "province_id" => "12",
                "name" => "kota medan",
            ],
            [
                "id" => "1276",
                "province_id" => "12",
                "name" => "kota binjai",
            ],
            [
                "id" => "1277",
                "province_id" => "12",
                "name" => "kota padangsidimpuan",
            ],
            [
                "id" => "1278",
                "province_id" => "12",
                "name" => "kota gunungsitoli",
            ],
            [
                "id" => "1301",
                "province_id" => "13",
                "name" => "kabupaten kepulauan mentawai",
            ],
            [
                "id" => "1302",
                "province_id" => "13",
                "name" => "kabupaten pesisir selatan",
            ],
            [
                "id" => "1303",
                "province_id" => "13",
                "name" => "kabupaten solok",
            ],
            [
                "id" => "1304",
                "province_id" => "13",
                "name" => "kabupaten sijunjung",
            ],
            [
                "id" => "1305",
                "province_id" => "13",
                "name" => "kabupaten tanah datar",
            ],
            [
                "id" => "1306",
                "province_id" => "13",
                "name" => "kabupaten padang pariaman",
            ],
            [
                "id" => "1307",
                "province_id" => "13",
                "name" => "kabupaten agam",
            ],
            [
                "id" => "1308",
                "province_id" => "13",
                "name" => "kabupaten lima puluh kota",
            ],
            [
                "id" => "1309",
                "province_id" => "13",
                "name" => "kabupaten pasaman",
            ],
            [
                "id" => "1310",
                "province_id" => "13",
                "name" => "kabupaten solok selatan",
            ],
            [
                "id" => "1311",
                "province_id" => "13",
                "name" => "kabupaten dharmasraya",
            ],
            [
                "id" => "1312",
                "province_id" => "13",
                "name" => "kabupaten pasaman barat",
            ],
            [
                "id" => "1371",
                "province_id" => "13",
                "name" => "kota padang",
            ],
            [
                "id" => "1372",
                "province_id" => "13",
                "name" => "kota solok",
            ],
            [
                "id" => "1373",
                "province_id" => "13",
                "name" => "kota sawah lunto",
            ],
            [
                "id" => "1374",
                "province_id" => "13",
                "name" => "kota padang panjang",
            ],
            [
                "id" => "1375",
                "province_id" => "13",
                "name" => "kota bukittinggi",
            ],
            [
                "id" => "1376",
                "province_id" => "13",
                "name" => "kota payakumbuh",
            ],
            [
                "id" => "1377",
                "province_id" => "13",
                "name" => "kota pariaman",
            ],
            [
                "id" => "1401",
                "province_id" => "14",
                "name" => "kabupaten kuantan singingi",
            ],
            [
                "id" => "1402",
                "province_id" => "14",
                "name" => "kabupaten indragiri hulu",
            ],
            [
                "id" => "1403",
                "province_id" => "14",
                "name" => "kabupaten indragiri hilir",
            ],
            [
                "id" => "1404",
                "province_id" => "14",
                "name" => "kabupaten pelalawan",
            ],
            [
                "id" => "1405",
                "province_id" => "14",
                "name" => "kabupaten s i a k",
            ],
            [
                "id" => "1406",
                "province_id" => "14",
                "name" => "kabupaten kampar",
            ],
            [
                "id" => "1407",
                "province_id" => "14",
                "name" => "kabupaten rokan hulu",
            ],
            [
                "id" => "1408",
                "province_id" => "14",
                "name" => "kabupaten bengkalis",
            ],
            [
                "id" => "1409",
                "province_id" => "14",
                "name" => "kabupaten rokan hilir",
            ],
            [
                "id" => "1410",
                "province_id" => "14",
                "name" => "kabupaten kepulauan meranti",
            ],
            [
                "id" => "1471",
                "province_id" => "14",
                "name" => "kota pekanbaru",
            ],
            [
                "id" => "1473",
                "province_id" => "14",
                "name" => "kota d u m a i",
            ],
            [
                "id" => "1501",
                "province_id" => "15",
                "name" => "kabupaten kerinci",
            ],
            [
                "id" => "1502",
                "province_id" => "15",
                "name" => "kabupaten merangin",
            ],
            [
                "id" => "1503",
                "province_id" => "15",
                "name" => "kabupaten sarolangun",
            ],
            [
                "id" => "1504",
                "province_id" => "15",
                "name" => "kabupaten batang hari",
            ],
            [
                "id" => "1505",
                "province_id" => "15",
                "name" => "kabupaten muaro jambi",
            ],
            [
                "id" => "1506",
                "province_id" => "15",
                "name" => "kabupaten tanjung jabung timur",
            ],
            [
                "id" => "1507",
                "province_id" => "15",
                "name" => "kabupaten tanjung jabung barat",
            ],
            [
                "id" => "1508",
                "province_id" => "15",
                "name" => "kabupaten tebo",
            ],
            [
                "id" => "1509",
                "province_id" => "15",
                "name" => "kabupaten bungo",
            ],
            [
                "id" => "1571",
                "province_id" => "15",
                "name" => "kota jambi",
            ],
            [
                "id" => "1572",
                "province_id" => "15",
                "name" => "kota sungai penuh",
            ],
            [
                "id" => "1601",
                "province_id" => "16",
                "name" => "kabupaten ogan komering ulu",
            ],
            [
                "id" => "1602",
                "province_id" => "16",
                "name" => "kabupaten ogan komering ilir",
            ],
            [
                "id" => "1603",
                "province_id" => "16",
                "name" => "kabupaten muara enim",
            ],
            [
                "id" => "1604",
                "province_id" => "16",
                "name" => "kabupaten lahat",
            ],
            [
                "id" => "1605",
                "province_id" => "16",
                "name" => "kabupaten musi rawas",
            ],
            [
                "id" => "1606",
                "province_id" => "16",
                "name" => "kabupaten musi banyuasin",
            ],
            [
                "id" => "1607",
                "province_id" => "16",
                "name" => "kabupaten banyu asin",
            ],
            [
                "id" => "1608",
                "province_id" => "16",
                "name" => "kabupaten ogan komering ulu selatan",
            ],
            [
                "id" => "1609",
                "province_id" => "16",
                "name" => "kabupaten ogan komering ulu timur",
            ],
            [
                "id" => "1610",
                "province_id" => "16",
                "name" => "kabupaten ogan ilir",
            ],
            [
                "id" => "1611",
                "province_id" => "16",
                "name" => "kabupaten empat lawang",
            ],
            [
                "id" => "1612",
                "province_id" => "16",
                "name" => "kabupaten penukal abab lematang ilir",
            ],
            [
                "id" => "1613",
                "province_id" => "16",
                "name" => "kabupaten musi rawas utara",
            ],
            [
                "id" => "1671",
                "province_id" => "16",
                "name" => "kota palembang",
            ],
            [
                "id" => "1672",
                "province_id" => "16",
                "name" => "kota prabumulih",
            ],
            [
                "id" => "1673",
                "province_id" => "16",
                "name" => "kota pagar alam",
            ],
            [
                "id" => "1674",
                "province_id" => "16",
                "name" => "kota lubuklinggau",
            ],
            [
                "id" => "1701",
                "province_id" => "17",
                "name" => "kabupaten bengkulu selatan",
            ],
            [
                "id" => "1702",
                "province_id" => "17",
                "name" => "kabupaten rejang lebong",
            ],
            [
                "id" => "1703",
                "province_id" => "17",
                "name" => "kabupaten bengkulu utara",
            ],
            [
                "id" => "1704",
                "province_id" => "17",
                "name" => "kabupaten kaur",
            ],
            [
                "id" => "1705",
                "province_id" => "17",
                "name" => "kabupaten seluma",
            ],
            [
                "id" => "1706",
                "province_id" => "17",
                "name" => "kabupaten mukomuko",
            ],
            [
                "id" => "1707",
                "province_id" => "17",
                "name" => "kabupaten lebong",
            ],
            [
                "id" => "1708",
                "province_id" => "17",
                "name" => "kabupaten kepahiang",
            ],
            [
                "id" => "1709",
                "province_id" => "17",
                "name" => "kabupaten bengkulu tengah",
            ],
            [
                "id" => "1771",
                "province_id" => "17",
                "name" => "kota bengkulu",
            ],
            [
                "id" => "1801",
                "province_id" => "18",
                "name" => "kabupaten lampung barat",
            ],
            [
                "id" => "1802",
                "province_id" => "18",
                "name" => "kabupaten tanggamus",
            ],
            [
                "id" => "1803",
                "province_id" => "18",
                "name" => "kabupaten lampung selatan",
            ],
            [
                "id" => "1804",
                "province_id" => "18",
                "name" => "kabupaten lampung timur",
            ],
            [
                "id" => "1805",
                "province_id" => "18",
                "name" => "kabupaten lampung tengah",
            ],
            [
                "id" => "1806",
                "province_id" => "18",
                "name" => "kabupaten lampung utara",
            ],
            [
                "id" => "1807",
                "province_id" => "18",
                "name" => "kabupaten way kanan",
            ],
            [
                "id" => "1808",
                "province_id" => "18",
                "name" => "kabupaten tulangbawang",
            ],
            [
                "id" => "1809",
                "province_id" => "18",
                "name" => "kabupaten pesawaran",
            ],
            [
                "id" => "1810",
                "province_id" => "18",
                "name" => "kabupaten pringsewu",
            ],
            [
                "id" => "1811",
                "province_id" => "18",
                "name" => "kabupaten mesuji",
            ],
            [
                "id" => "1812",
                "province_id" => "18",
                "name" => "kabupaten tulang bawang barat",
            ],
            [
                "id" => "1813",
                "province_id" => "18",
                "name" => "kabupaten pesisir barat",
            ],
            [
                "id" => "1871",
                "province_id" => "18",
                "name" => "kota bandar lampung",
            ],
            [
                "id" => "1872",
                "province_id" => "18",
                "name" => "kota metro",
            ],
            [
                "id" => "1901",
                "province_id" => "19",
                "name" => "kabupaten bangka",
            ],
            [
                "id" => "1902",
                "province_id" => "19",
                "name" => "kabupaten belitung",
            ],
            [
                "id" => "1903",
                "province_id" => "19",
                "name" => "kabupaten bangka barat",
            ],
            [
                "id" => "1904",
                "province_id" => "19",
                "name" => "kabupaten bangka tengah",
            ],
            [
                "id" => "1905",
                "province_id" => "19",
                "name" => "kabupaten bangka selatan",
            ],
            [
                "id" => "1906",
                "province_id" => "19",
                "name" => "kabupaten belitung timur",
            ],
            [
                "id" => "1971",
                "province_id" => "19",
                "name" => "kota pangkal pinang",
            ],
            [
                "id" => "2101",
                "province_id" => "21",
                "name" => "kabupaten karimun",
            ],
            [
                "id" => "2102",
                "province_id" => "21",
                "name" => "kabupaten bintan",
            ],
            [
                "id" => "2103",
                "province_id" => "21",
                "name" => "kabupaten natuna",
            ],
            [
                "id" => "2104",
                "province_id" => "21",
                "name" => "kabupaten lingga",
            ],
            [
                "id" => "2105",
                "province_id" => "21",
                "name" => "kabupaten kepulauan anambas",
            ],
            [
                "id" => "2171",
                "province_id" => "21",
                "name" => "kota b a t a m",
            ],
            [
                "id" => "2172",
                "province_id" => "21",
                "name" => "kota tanjung pinang",
            ],
            [
                "id" => "3101",
                "province_id" => "31",
                "name" => "kabupaten kepulauan seribu",
            ],
            [
                "id" => "3171",
                "province_id" => "31",
                "name" => "kota jakarta selatan",
            ],
            [
                "id" => "3172",
                "province_id" => "31",
                "name" => "kota jakarta timur",
            ],
            [
                "id" => "3173",
                "province_id" => "31",
                "name" => "kota jakarta pusat",
            ],
            [
                "id" => "3174",
                "province_id" => "31",
                "name" => "kota jakarta barat",
            ],
            [
                "id" => "3175",
                "province_id" => "31",
                "name" => "kota jakarta utara",
            ],
            [
                "id" => "3201",
                "province_id" => "32",
                "name" => "kabupaten bogor",
            ],
            [
                "id" => "3202",
                "province_id" => "32",
                "name" => "kabupaten sukabumi",
            ],
            [
                "id" => "3203",
                "province_id" => "32",
                "name" => "kabupaten cianjur",
            ],
            [
                "id" => "3204",
                "province_id" => "32",
                "name" => "kabupaten bandung",
            ],
            [
                "id" => "3205",
                "province_id" => "32",
                "name" => "kabupaten garut",
            ],
            [
                "id" => "3206",
                "province_id" => "32",
                "name" => "kabupaten tasikmalaya",
            ],
            [
                "id" => "3207",
                "province_id" => "32",
                "name" => "kabupaten ciamis",
            ],
            [
                "id" => "3208",
                "province_id" => "32",
                "name" => "kabupaten kuningan",
            ],
            [
                "id" => "3209",
                "province_id" => "32",
                "name" => "kabupaten cirebon",
            ],
            [
                "id" => "3210",
                "province_id" => "32",
                "name" => "kabupaten majalengka",
            ],
            [
                "id" => "3211",
                "province_id" => "32",
                "name" => "kabupaten sumedang",
            ],
            [
                "id" => "3212",
                "province_id" => "32",
                "name" => "kabupaten indramayu",
            ],
            [
                "id" => "3213",
                "province_id" => "32",
                "name" => "kabupaten subang",
            ],
            [
                "id" => "3214",
                "province_id" => "32",
                "name" => "kabupaten purwakarta",
            ],
            [
                "id" => "3215",
                "province_id" => "32",
                "name" => "kabupaten karawang",
            ],
            [
                "id" => "3216",
                "province_id" => "32",
                "name" => "kabupaten bekasi",
            ],
            [
                "id" => "3217",
                "province_id" => "32",
                "name" => "kabupaten bandung barat",
            ],
            [
                "id" => "3218",
                "province_id" => "32",
                "name" => "kabupaten pangandaran",
            ],
            [
                "id" => "3271",
                "province_id" => "32",
                "name" => "kota bogor",
            ],
            [
                "id" => "3272",
                "province_id" => "32",
                "name" => "kota sukabumi",
            ],
            [
                "id" => "3273",
                "province_id" => "32",
                "name" => "kota bandung",
            ],
            [
                "id" => "3274",
                "province_id" => "32",
                "name" => "kota cirebon",
            ],
            [
                "id" => "3275",
                "province_id" => "32",
                "name" => "kota bekasi",
            ],
            [
                "id" => "3276",
                "province_id" => "32",
                "name" => "kota depok",
            ],
            [
                "id" => "3277",
                "province_id" => "32",
                "name" => "kota cimahi",
            ],
            [
                "id" => "3278",
                "province_id" => "32",
                "name" => "kota tasikmalaya",
            ],
            [
                "id" => "3279",
                "province_id" => "32",
                "name" => "kota banjar",
            ],
            [
                "id" => "3301",
                "province_id" => "33",
                "name" => "kabupaten cilacap",
            ],
            [
                "id" => "3302",
                "province_id" => "33",
                "name" => "kabupaten banyumas",
            ],
            [
                "id" => "3303",
                "province_id" => "33",
                "name" => "kabupaten purbalingga",
            ],
            [
                "id" => "3304",
                "province_id" => "33",
                "name" => "kabupaten banjarnegara",
            ],
            [
                "id" => "3305",
                "province_id" => "33",
                "name" => "kabupaten kebumen",
            ],
            [
                "id" => "3306",
                "province_id" => "33",
                "name" => "kabupaten purworejo",
            ],
            [
                "id" => "3307",
                "province_id" => "33",
                "name" => "kabupaten wonosobo",
            ],
            [
                "id" => "3308",
                "province_id" => "33",
                "name" => "kabupaten magelang",
            ],
            [
                "id" => "3309",
                "province_id" => "33",
                "name" => "kabupaten boyolali",
            ],
            [
                "id" => "3310",
                "province_id" => "33",
                "name" => "kabupaten klaten",
            ],
            [
                "id" => "3311",
                "province_id" => "33",
                "name" => "kabupaten sukoharjo",
            ],
            [
                "id" => "3312",
                "province_id" => "33",
                "name" => "kabupaten wonogiri",
            ],
            [
                "id" => "3313",
                "province_id" => "33",
                "name" => "kabupaten karanganyar",
            ],
            [
                "id" => "3314",
                "province_id" => "33",
                "name" => "kabupaten sragen",
            ],
            [
                "id" => "3315",
                "province_id" => "33",
                "name" => "kabupaten grobogan",
            ],
            [
                "id" => "3316",
                "province_id" => "33",
                "name" => "kabupaten blora",
            ],
            [
                "id" => "3317",
                "province_id" => "33",
                "name" => "kabupaten rembang",
            ],
            [
                "id" => "3318",
                "province_id" => "33",
                "name" => "kabupaten pati",
            ],
            [
                "id" => "3319",
                "province_id" => "33",
                "name" => "kabupaten kudus",
            ],
            [
                "id" => "3320",
                "province_id" => "33",
                "name" => "kabupaten jepara",
            ],
            [
                "id" => "3321",
                "province_id" => "33",
                "name" => "kabupaten demak",
            ],
            [
                "id" => "3322",
                "province_id" => "33",
                "name" => "kabupaten semarang",
            ],
            [
                "id" => "3323",
                "province_id" => "33",
                "name" => "kabupaten temanggung",
            ],
            [
                "id" => "3324",
                "province_id" => "33",
                "name" => "kabupaten kendal",
            ],
            [
                "id" => "3325",
                "province_id" => "33",
                "name" => "kabupaten batang",
            ],
            [
                "id" => "3326",
                "province_id" => "33",
                "name" => "kabupaten pekalongan",
            ],
            [
                "id" => "3327",
                "province_id" => "33",
                "name" => "kabupaten pemalang",
            ],
            [
                "id" => "3328",
                "province_id" => "33",
                "name" => "kabupaten tegal",
            ],
            [
                "id" => "3329",
                "province_id" => "33",
                "name" => "kabupaten brebes",
            ],
            [
                "id" => "3371",
                "province_id" => "33",
                "name" => "kota magelang",
            ],
            [
                "id" => "3372",
                "province_id" => "33",
                "name" => "kota surakarta",
            ],
            [
                "id" => "3373",
                "province_id" => "33",
                "name" => "kota salatiga",
            ],
            [
                "id" => "3374",
                "province_id" => "33",
                "name" => "kota semarang",
            ],
            [
                "id" => "3375",
                "province_id" => "33",
                "name" => "kota pekalongan",
            ],
            [
                "id" => "3376",
                "province_id" => "33",
                "name" => "kota tegal",
            ],
            [
                "id" => "3401",
                "province_id" => "34",
                "name" => "kabupaten kulon progo",
            ],
            [
                "id" => "3402",
                "province_id" => "34",
                "name" => "kabupaten bantul",
            ],
            [
                "id" => "3403",
                "province_id" => "34",
                "name" => "kabupaten gunung kidul",
            ],
            [
                "id" => "3404",
                "province_id" => "34",
                "name" => "kabupaten sleman",
            ],
            [
                "id" => "3471",
                "province_id" => "34",
                "name" => "kota yogyakarta",
            ],
            [
                "id" => "3501",
                "province_id" => "35",
                "name" => "kabupaten pacitan",
            ],
            [
                "id" => "3502",
                "province_id" => "35",
                "name" => "kabupaten ponorogo",
            ],
            [
                "id" => "3503",
                "province_id" => "35",
                "name" => "kabupaten trenggalek",
            ],
            [
                "id" => "3504",
                "province_id" => "35",
                "name" => "kabupaten tulungagung",
            ],
            [
                "id" => "3505",
                "province_id" => "35",
                "name" => "kabupaten blitar",
            ],
            [
                "id" => "3506",
                "province_id" => "35",
                "name" => "kabupaten kediri",
            ],
            [
                "id" => "3507",
                "province_id" => "35",
                "name" => "kabupaten malang",
            ],
            [
                "id" => "3508",
                "province_id" => "35",
                "name" => "kabupaten lumajang",
            ],
            [
                "id" => "3509",
                "province_id" => "35",
                "name" => "kabupaten jember",
            ],
            [
                "id" => "3510",
                "province_id" => "35",
                "name" => "kabupaten banyuwangi",
            ],
            [
                "id" => "3511",
                "province_id" => "35",
                "name" => "kabupaten bondowoso",
            ],
            [
                "id" => "3512",
                "province_id" => "35",
                "name" => "kabupaten situbondo",
            ],
            [
                "id" => "3513",
                "province_id" => "35",
                "name" => "kabupaten probolinggo",
            ],
            [
                "id" => "3514",
                "province_id" => "35",
                "name" => "kabupaten pasuruan",
            ],
            [
                "id" => "3515",
                "province_id" => "35",
                "name" => "kabupaten sidoarjo",
            ],
            [
                "id" => "3516",
                "province_id" => "35",
                "name" => "kabupaten mojokerto",
            ],
            [
                "id" => "3517",
                "province_id" => "35",
                "name" => "kabupaten jombang",
            ],
            [
                "id" => "3518",
                "province_id" => "35",
                "name" => "kabupaten nganjuk",
            ],
            [
                "id" => "3519",
                "province_id" => "35",
                "name" => "kabupaten madiun",
            ],
            [
                "id" => "3520",
                "province_id" => "35",
                "name" => "kabupaten magetan",
            ],
            [
                "id" => "3521",
                "province_id" => "35",
                "name" => "kabupaten ngawi",
            ],
            [
                "id" => "3522",
                "province_id" => "35",
                "name" => "kabupaten bojonegoro",
            ],
            [
                "id" => "3523",
                "province_id" => "35",
                "name" => "kabupaten tuban",
            ],
            [
                "id" => "3524",
                "province_id" => "35",
                "name" => "kabupaten lamongan",
            ],
            [
                "id" => "3525",
                "province_id" => "35",
                "name" => "kabupaten gresik",
            ],
            [
                "id" => "3526",
                "province_id" => "35",
                "name" => "kabupaten bangkalan",
            ],
            [
                "id" => "3527",
                "province_id" => "35",
                "name" => "kabupaten sampang",
            ],
            [
                "id" => "3528",
                "province_id" => "35",
                "name" => "kabupaten pamekasan",
            ],
            [
                "id" => "3529",
                "province_id" => "35",
                "name" => "kabupaten sumenep",
            ],
            [
                "id" => "3571",
                "province_id" => "35",
                "name" => "kota kediri",
            ],
            [
                "id" => "3572",
                "province_id" => "35",
                "name" => "kota blitar",
            ],
            [
                "id" => "3573",
                "province_id" => "35",
                "name" => "kota malang",
            ],
            [
                "id" => "3574",
                "province_id" => "35",
                "name" => "kota probolinggo",
            ],
            [
                "id" => "3575",
                "province_id" => "35",
                "name" => "kota pasuruan",
            ],
            [
                "id" => "3576",
                "province_id" => "35",
                "name" => "kota mojokerto",
            ],
            [
                "id" => "3577",
                "province_id" => "35",
                "name" => "kota madiun",
            ],
            [
                "id" => "3578",
                "province_id" => "35",
                "name" => "kota surabaya",
            ],
            [
                "id" => "3579",
                "province_id" => "35",
                "name" => "kota batu",
            ],
            [
                "id" => "3601",
                "province_id" => "36",
                "name" => "kabupaten pandeglang",
            ],
            [
                "id" => "3602",
                "province_id" => "36",
                "name" => "kabupaten lebak",
            ],
            [
                "id" => "3603",
                "province_id" => "36",
                "name" => "kabupaten tangerang",
            ],
            [
                "id" => "3604",
                "province_id" => "36",
                "name" => "kabupaten serang",
            ],
            [
                "id" => "3671",
                "province_id" => "36",
                "name" => "kota tangerang",
            ],
            [
                "id" => "3672",
                "province_id" => "36",
                "name" => "kota cilegon",
            ],
            [
                "id" => "3673",
                "province_id" => "36",
                "name" => "kota serang",
            ],
            [
                "id" => "3674",
                "province_id" => "36",
                "name" => "kota tangerang selatan",
            ],
            [
                "id" => "5101",
                "province_id" => "51",
                "name" => "kabupaten jembrana",
            ],
            [
                "id" => "5102",
                "province_id" => "51",
                "name" => "kabupaten tabanan",
            ],
            [
                "id" => "5103",
                "province_id" => "51",
                "name" => "kabupaten badung",
            ],
            [
                "id" => "5104",
                "province_id" => "51",
                "name" => "kabupaten gianyar",
            ],
            [
                "id" => "5105",
                "province_id" => "51",
                "name" => "kabupaten klungkung",
            ],
            [
                "id" => "5106",
                "province_id" => "51",
                "name" => "kabupaten bangli",
            ],
            [
                "id" => "5107",
                "province_id" => "51",
                "name" => "kabupaten karang asem",
            ],
            [
                "id" => "5108",
                "province_id" => "51",
                "name" => "kabupaten buleleng",
            ],
            [
                "id" => "5171",
                "province_id" => "51",
                "name" => "kota denpasar",
            ],
            [
                "id" => "5201",
                "province_id" => "52",
                "name" => "kabupaten lombok barat",
            ],
            [
                "id" => "5202",
                "province_id" => "52",
                "name" => "kabupaten lombok tengah",
            ],
            [
                "id" => "5203",
                "province_id" => "52",
                "name" => "kabupaten lombok timur",
            ],
            [
                "id" => "5204",
                "province_id" => "52",
                "name" => "kabupaten sumbawa",
            ],
            [
                "id" => "5205",
                "province_id" => "52",
                "name" => "kabupaten dompu",
            ],
            [
                "id" => "5206",
                "province_id" => "52",
                "name" => "kabupaten bima",
            ],
            [
                "id" => "5207",
                "province_id" => "52",
                "name" => "kabupaten sumbawa barat",
            ],
            [
                "id" => "5208",
                "province_id" => "52",
                "name" => "kabupaten lombok utara",
            ],
            [
                "id" => "5271",
                "province_id" => "52",
                "name" => "kota mataram",
            ],
            [
                "id" => "5272",
                "province_id" => "52",
                "name" => "kota bima",
            ],
            [
                "id" => "5301",
                "province_id" => "53",
                "name" => "kabupaten sumba barat",
            ],
            [
                "id" => "5302",
                "province_id" => "53",
                "name" => "kabupaten sumba timur",
            ],
            [
                "id" => "5303",
                "province_id" => "53",
                "name" => "kabupaten kupang",
            ],
            [
                "id" => "5304",
                "province_id" => "53",
                "name" => "kabupaten timor tengah selatan",
            ],
            [
                "id" => "5305",
                "province_id" => "53",
                "name" => "kabupaten timor tengah utara",
            ],
            [
                "id" => "5306",
                "province_id" => "53",
                "name" => "kabupaten belu",
            ],
            [
                "id" => "5307",
                "province_id" => "53",
                "name" => "kabupaten alor",
            ],
            [
                "id" => "5308",
                "province_id" => "53",
                "name" => "kabupaten lembata",
            ],
            [
                "id" => "5309",
                "province_id" => "53",
                "name" => "kabupaten flores timur",
            ],
            [
                "id" => "5310",
                "province_id" => "53",
                "name" => "kabupaten sikka",
            ],
            [
                "id" => "5311",
                "province_id" => "53",
                "name" => "kabupaten ende",
            ],
            [
                "id" => "5312",
                "province_id" => "53",
                "name" => "kabupaten ngada",
            ],
            [
                "id" => "5313",
                "province_id" => "53",
                "name" => "kabupaten manggarai",
            ],
            [
                "id" => "5314",
                "province_id" => "53",
                "name" => "kabupaten rote ndao",
            ],
            [
                "id" => "5315",
                "province_id" => "53",
                "name" => "kabupaten manggarai barat",
            ],
            [
                "id" => "5316",
                "province_id" => "53",
                "name" => "kabupaten sumba tengah",
            ],
            [
                "id" => "5317",
                "province_id" => "53",
                "name" => "kabupaten sumba barat daya",
            ],
            [
                "id" => "5318",
                "province_id" => "53",
                "name" => "kabupaten nagekeo",
            ],
            [
                "id" => "5319",
                "province_id" => "53",
                "name" => "kabupaten manggarai timur",
            ],
            [
                "id" => "5320",
                "province_id" => "53",
                "name" => "kabupaten sabu raijua",
            ],
            [
                "id" => "5321",
                "province_id" => "53",
                "name" => "kabupaten malaka",
            ],
            [
                "id" => "5371",
                "province_id" => "53",
                "name" => "kota kupang",
            ],
            [
                "id" => "6101",
                "province_id" => "61",
                "name" => "kabupaten sambas",
            ],
            [
                "id" => "6102",
                "province_id" => "61",
                "name" => "kabupaten bengkayang",
            ],
            [
                "id" => "6103",
                "province_id" => "61",
                "name" => "kabupaten landak",
            ],
            [
                "id" => "6104",
                "province_id" => "61",
                "name" => "kabupaten mempawah",
            ],
            [
                "id" => "6105",
                "province_id" => "61",
                "name" => "kabupaten sanggau",
            ],
            [
                "id" => "6106",
                "province_id" => "61",
                "name" => "kabupaten ketapang",
            ],
            [
                "id" => "6107",
                "province_id" => "61",
                "name" => "kabupaten sintang",
            ],
            [
                "id" => "6108",
                "province_id" => "61",
                "name" => "kabupaten kapuas hulu",
            ],
            [
                "id" => "6109",
                "province_id" => "61",
                "name" => "kabupaten sekadau",
            ],
            [
                "id" => "6110",
                "province_id" => "61",
                "name" => "kabupaten melawi",
            ],
            [
                "id" => "6111",
                "province_id" => "61",
                "name" => "kabupaten kayong utara",
            ],
            [
                "id" => "6112",
                "province_id" => "61",
                "name" => "kabupaten kubu raya",
            ],
            [
                "id" => "6171",
                "province_id" => "61",
                "name" => "kota pontianak",
            ],
            [
                "id" => "6172",
                "province_id" => "61",
                "name" => "kota singkawang",
            ],
            [
                "id" => "6201",
                "province_id" => "62",
                "name" => "kabupaten kotawaringin barat",
            ],
            [
                "id" => "6202",
                "province_id" => "62",
                "name" => "kabupaten kotawaringin timur",
            ],
            [
                "id" => "6203",
                "province_id" => "62",
                "name" => "kabupaten kapuas",
            ],
            [
                "id" => "6204",
                "province_id" => "62",
                "name" => "kabupaten barito selatan",
            ],
            [
                "id" => "6205",
                "province_id" => "62",
                "name" => "kabupaten barito utara",
            ],
            [
                "id" => "6206",
                "province_id" => "62",
                "name" => "kabupaten sukamara",
            ],
            [
                "id" => "6207",
                "province_id" => "62",
                "name" => "kabupaten lamandau",
            ],
            [
                "id" => "6208",
                "province_id" => "62",
                "name" => "kabupaten seruyan",
            ],
            [
                "id" => "6209",
                "province_id" => "62",
                "name" => "kabupaten katingan",
            ],
            [
                "id" => "6210",
                "province_id" => "62",
                "name" => "kabupaten pulang pisau",
            ],
            [
                "id" => "6211",
                "province_id" => "62",
                "name" => "kabupaten gunung mas",
            ],
            [
                "id" => "6212",
                "province_id" => "62",
                "name" => "kabupaten barito timur",
            ],
            [
                "id" => "6213",
                "province_id" => "62",
                "name" => "kabupaten murung raya",
            ],
            [
                "id" => "6271",
                "province_id" => "62",
                "name" => "kota palangka raya",
            ],
            [
                "id" => "6301",
                "province_id" => "63",
                "name" => "kabupaten tanah laut",
            ],
            [
                "id" => "6302",
                "province_id" => "63",
                "name" => "kabupaten kota baru",
            ],
            [
                "id" => "6303",
                "province_id" => "63",
                "name" => "kabupaten banjar",
            ],
            [
                "id" => "6304",
                "province_id" => "63",
                "name" => "kabupaten barito kuala",
            ],
            [
                "id" => "6305",
                "province_id" => "63",
                "name" => "kabupaten tapin",
            ],
            [
                "id" => "6306",
                "province_id" => "63",
                "name" => "kabupaten hulu sungai selatan",
            ],
            [
                "id" => "6307",
                "province_id" => "63",
                "name" => "kabupaten hulu sungai tengah",
            ],
            [
                "id" => "6308",
                "province_id" => "63",
                "name" => "kabupaten hulu sungai utara",
            ],
            [
                "id" => "6309",
                "province_id" => "63",
                "name" => "kabupaten tabalong",
            ],
            [
                "id" => "6310",
                "province_id" => "63",
                "name" => "kabupaten tanah bumbu",
            ],
            [
                "id" => "6311",
                "province_id" => "63",
                "name" => "kabupaten balangan",
            ],
            [
                "id" => "6371",
                "province_id" => "63",
                "name" => "kota banjarmasin",
            ],
            [
                "id" => "6372",
                "province_id" => "63",
                "name" => "kota banjar baru",
            ],
            [
                "id" => "6401",
                "province_id" => "64",
                "name" => "kabupaten paser",
            ],
            [
                "id" => "6402",
                "province_id" => "64",
                "name" => "kabupaten kutai barat",
            ],
            [
                "id" => "6403",
                "province_id" => "64",
                "name" => "kabupaten kutai kartanegara",
            ],
            [
                "id" => "6404",
                "province_id" => "64",
                "name" => "kabupaten kutai timur",
            ],
            [
                "id" => "6405",
                "province_id" => "64",
                "name" => "kabupaten berau",
            ],
            [
                "id" => "6409",
                "province_id" => "64",
                "name" => "kabupaten penajam paser utara",
            ],
            [
                "id" => "6411",
                "province_id" => "64",
                "name" => "kabupaten mahakam hulu",
            ],
            [
                "id" => "6471",
                "province_id" => "64",
                "name" => "kota balikpapan",
            ],
            [
                "id" => "6472",
                "province_id" => "64",
                "name" => "kota samarinda",
            ],
            [
                "id" => "6474",
                "province_id" => "64",
                "name" => "kota bontang",
            ],
            [
                "id" => "6501",
                "province_id" => "65",
                "name" => "kabupaten malinau",
            ],
            [
                "id" => "6502",
                "province_id" => "65",
                "name" => "kabupaten bulungan",
            ],
            [
                "id" => "6503",
                "province_id" => "65",
                "name" => "kabupaten tana tidung",
            ],
            [
                "id" => "6504",
                "province_id" => "65",
                "name" => "kabupaten nunukan",
            ],
            [
                "id" => "6571",
                "province_id" => "65",
                "name" => "kota tarakan",
            ],
            [
                "id" => "7101",
                "province_id" => "71",
                "name" => "kabupaten bolaang mongondow",
            ],
            [
                "id" => "7102",
                "province_id" => "71",
                "name" => "kabupaten minahasa",
            ],
            [
                "id" => "7103",
                "province_id" => "71",
                "name" => "kabupaten kepulauan sangihe",
            ],
            [
                "id" => "7104",
                "province_id" => "71",
                "name" => "kabupaten kepulauan talaud",
            ],
            [
                "id" => "7105",
                "province_id" => "71",
                "name" => "kabupaten minahasa selatan",
            ],
            [
                "id" => "7106",
                "province_id" => "71",
                "name" => "kabupaten minahasa utara",
            ],
            [
                "id" => "7107",
                "province_id" => "71",
                "name" => "kabupaten bolaang mongondow utara",
            ],
            [
                "id" => "7108",
                "province_id" => "71",
                "name" => "kabupaten siau tagulandang biaro",
            ],
            [
                "id" => "7109",
                "province_id" => "71",
                "name" => "kabupaten minahasa tenggara",
            ],
            [
                "id" => "7110",
                "province_id" => "71",
                "name" => "kabupaten bolaang mongondow selatan",
            ],
            [
                "id" => "7111",
                "province_id" => "71",
                "name" => "kabupaten bolaang mongondow timur",
            ],
            [
                "id" => "7171",
                "province_id" => "71",
                "name" => "kota manado",
            ],
            [
                "id" => "7172",
                "province_id" => "71",
                "name" => "kota bitung",
            ],
            [
                "id" => "7173",
                "province_id" => "71",
                "name" => "kota tomohon",
            ],
            [
                "id" => "7174",
                "province_id" => "71",
                "name" => "kota kotamobagu",
            ],
            [
                "id" => "7201",
                "province_id" => "72",
                "name" => "kabupaten banggai kepulauan",
            ],
            [
                "id" => "7202",
                "province_id" => "72",
                "name" => "kabupaten banggai",
            ],
            [
                "id" => "7203",
                "province_id" => "72",
                "name" => "kabupaten morowali",
            ],
            [
                "id" => "7204",
                "province_id" => "72",
                "name" => "kabupaten poso",
            ],
            [
                "id" => "7205",
                "province_id" => "72",
                "name" => "kabupaten donggala",
            ],
            [
                "id" => "7206",
                "province_id" => "72",
                "name" => "kabupaten toli-toli",
            ],
            [
                "id" => "7207",
                "province_id" => "72",
                "name" => "kabupaten buol",
            ],
            [
                "id" => "7208",
                "province_id" => "72",
                "name" => "kabupaten parigi moutong",
            ],
            [
                "id" => "7209",
                "province_id" => "72",
                "name" => "kabupaten tojo una-una",
            ],
            [
                "id" => "7210",
                "province_id" => "72",
                "name" => "kabupaten sigi",
            ],
            [
                "id" => "7211",
                "province_id" => "72",
                "name" => "kabupaten banggai laut",
            ],
            [
                "id" => "7212",
                "province_id" => "72",
                "name" => "kabupaten morowali utara",
            ],
            [
                "id" => "7271",
                "province_id" => "72",
                "name" => "kota palu",
            ],
            [
                "id" => "7301",
                "province_id" => "73",
                "name" => "kabupaten kepulauan selayar",
            ],
            [
                "id" => "7302",
                "province_id" => "73",
                "name" => "kabupaten bulukumba",
            ],
            [
                "id" => "7303",
                "province_id" => "73",
                "name" => "kabupaten bantaeng",
            ],
            [
                "id" => "7304",
                "province_id" => "73",
                "name" => "kabupaten jeneponto",
            ],
            [
                "id" => "7305",
                "province_id" => "73",
                "name" => "kabupaten takalar",
            ],
            [
                "id" => "7306",
                "province_id" => "73",
                "name" => "kabupaten gowa",
            ],
            [
                "id" => "7307",
                "province_id" => "73",
                "name" => "kabupaten sinjai",
            ],
            [
                "id" => "7308",
                "province_id" => "73",
                "name" => "kabupaten maros",
            ],
            [
                "id" => "7309",
                "province_id" => "73",
                "name" => "kabupaten pangkajene dan kepulauan",
            ],
            [
                "id" => "7310",
                "province_id" => "73",
                "name" => "kabupaten barru",
            ],
            [
                "id" => "7311",
                "province_id" => "73",
                "name" => "kabupaten bone",
            ],
            [
                "id" => "7312",
                "province_id" => "73",
                "name" => "kabupaten soppeng",
            ],
            [
                "id" => "7313",
                "province_id" => "73",
                "name" => "kabupaten wajo",
            ],
            [
                "id" => "7314",
                "province_id" => "73",
                "name" => "kabupaten sidenreng rappang",
            ],
            [
                "id" => "7315",
                "province_id" => "73",
                "name" => "kabupaten pinrang",
            ],
            [
                "id" => "7316",
                "province_id" => "73",
                "name" => "kabupaten enrekang",
            ],
            [
                "id" => "7317",
                "province_id" => "73",
                "name" => "kabupaten luwu",
            ],
            [
                "id" => "7318",
                "province_id" => "73",
                "name" => "kabupaten tana toraja",
            ],
            [
                "id" => "7322",
                "province_id" => "73",
                "name" => "kabupaten luwu utara",
            ],
            [
                "id" => "7325",
                "province_id" => "73",
                "name" => "kabupaten luwu timur",
            ],
            [
                "id" => "7326",
                "province_id" => "73",
                "name" => "kabupaten toraja utara",
            ],
            [
                "id" => "7371",
                "province_id" => "73",
                "name" => "kota makassar",
            ],
            [
                "id" => "7372",
                "province_id" => "73",
                "name" => "kota parepare",
            ],
            [
                "id" => "7373",
                "province_id" => "73",
                "name" => "kota palopo",
            ],
            [
                "id" => "7401",
                "province_id" => "74",
                "name" => "kabupaten buton",
            ],
            [
                "id" => "7402",
                "province_id" => "74",
                "name" => "kabupaten muna",
            ],
            [
                "id" => "7403",
                "province_id" => "74",
                "name" => "kabupaten konawe",
            ],
            [
                "id" => "7404",
                "province_id" => "74",
                "name" => "kabupaten kolaka",
            ],
            [
                "id" => "7405",
                "province_id" => "74",
                "name" => "kabupaten konawe selatan",
            ],
            [
                "id" => "7406",
                "province_id" => "74",
                "name" => "kabupaten bombana",
            ],
            [
                "id" => "7407",
                "province_id" => "74",
                "name" => "kabupaten wakatobi",
            ],
            [
                "id" => "7408",
                "province_id" => "74",
                "name" => "kabupaten kolaka utara",
            ],
            [
                "id" => "7409",
                "province_id" => "74",
                "name" => "kabupaten buton utara",
            ],
            [
                "id" => "7410",
                "province_id" => "74",
                "name" => "kabupaten konawe utara",
            ],
            [
                "id" => "7411",
                "province_id" => "74",
                "name" => "kabupaten kolaka timur",
            ],
            [
                "id" => "7412",
                "province_id" => "74",
                "name" => "kabupaten konawe kepulauan",
            ],
            [
                "id" => "7413",
                "province_id" => "74",
                "name" => "kabupaten muna barat",
            ],
            [
                "id" => "7414",
                "province_id" => "74",
                "name" => "kabupaten buton tengah",
            ],
            [
                "id" => "7415",
                "province_id" => "74",
                "name" => "kabupaten buton selatan",
            ],
            [
                "id" => "7471",
                "province_id" => "74",
                "name" => "kota kendari",
            ],
            [
                "id" => "7472",
                "province_id" => "74",
                "name" => "kota baubau",
            ],
            [
                "id" => "7501",
                "province_id" => "75",
                "name" => "kabupaten boalemo",
            ],
            [
                "id" => "7502",
                "province_id" => "75",
                "name" => "kabupaten gorontalo",
            ],
            [
                "id" => "7503",
                "province_id" => "75",
                "name" => "kabupaten pohuwato",
            ],
            [
                "id" => "7504",
                "province_id" => "75",
                "name" => "kabupaten bone bolango",
            ],
            [
                "id" => "7505",
                "province_id" => "75",
                "name" => "kabupaten gorontalo utara",
            ],
            [
                "id" => "7571",
                "province_id" => "75",
                "name" => "kota gorontalo",
            ],
            [
                "id" => "7601",
                "province_id" => "76",
                "name" => "kabupaten majene",
            ],
            [
                "id" => "7602",
                "province_id" => "76",
                "name" => "kabupaten polewali mandar",
            ],
            [
                "id" => "7603",
                "province_id" => "76",
                "name" => "kabupaten mamasa",
            ],
            [
                "id" => "7604",
                "province_id" => "76",
                "name" => "kabupaten mamuju",
            ],
            [
                "id" => "7605",
                "province_id" => "76",
                "name" => "kabupaten mamuju utara",
            ],
            [
                "id" => "7606",
                "province_id" => "76",
                "name" => "kabupaten mamuju tengah",
            ],
            [
                "id" => "8101",
                "province_id" => "81",
                "name" => "kabupaten maluku tenggara barat",
            ],
            [
                "id" => "8102",
                "province_id" => "81",
                "name" => "kabupaten maluku tenggara",
            ],
            [
                "id" => "8103",
                "province_id" => "81",
                "name" => "kabupaten maluku tengah",
            ],
            [
                "id" => "8104",
                "province_id" => "81",
                "name" => "kabupaten buru",
            ],
            [
                "id" => "8105",
                "province_id" => "81",
                "name" => "kabupaten kepulauan aru",
            ],
            [
                "id" => "8106",
                "province_id" => "81",
                "name" => "kabupaten seram bagian barat",
            ],
            [
                "id" => "8107",
                "province_id" => "81",
                "name" => "kabupaten seram bagian timur",
            ],
            [
                "id" => "8108",
                "province_id" => "81",
                "name" => "kabupaten maluku barat daya",
            ],
            [
                "id" => "8109",
                "province_id" => "81",
                "name" => "kabupaten buru selatan",
            ],
            [
                "id" => "8171",
                "province_id" => "81",
                "name" => "kota ambon",
            ],
            [
                "id" => "8172",
                "province_id" => "81",
                "name" => "kota tual",
            ],
            [
                "id" => "8201",
                "province_id" => "82",
                "name" => "kabupaten halmahera barat",
            ],
            [
                "id" => "8202",
                "province_id" => "82",
                "name" => "kabupaten halmahera tengah",
            ],
            [
                "id" => "8203",
                "province_id" => "82",
                "name" => "kabupaten kepulauan sula",
            ],
            [
                "id" => "8204",
                "province_id" => "82",
                "name" => "kabupaten halmahera selatan",
            ],
            [
                "id" => "8205",
                "province_id" => "82",
                "name" => "kabupaten halmahera utara",
            ],
            [
                "id" => "8206",
                "province_id" => "82",
                "name" => "kabupaten halmahera timur",
            ],
            [
                "id" => "8207",
                "province_id" => "82",
                "name" => "kabupaten pulau morotai",
            ],
            [
                "id" => "8208",
                "province_id" => "82",
                "name" => "kabupaten pulau taliabu",
            ],
            [
                "id" => "8271",
                "province_id" => "82",
                "name" => "kota ternate",
            ],
            [
                "id" => "8272",
                "province_id" => "82",
                "name" => "kota tidore kepulauan",
            ],
            [
                "id" => "9101",
                "province_id" => "91",
                "name" => "kabupaten fakfak",
            ],
            [
                "id" => "9102",
                "province_id" => "91",
                "name" => "kabupaten kaimana",
            ],
            [
                "id" => "9103",
                "province_id" => "91",
                "name" => "kabupaten teluk wondama",
            ],
            [
                "id" => "9104",
                "province_id" => "91",
                "name" => "kabupaten teluk bintuni",
            ],
            [
                "id" => "9105",
                "province_id" => "91",
                "name" => "kabupaten manokwari",
            ],
            [
                "id" => "9106",
                "province_id" => "91",
                "name" => "kabupaten sorong selatan",
            ],
            [
                "id" => "9107",
                "province_id" => "91",
                "name" => "kabupaten sorong",
            ],
            [
                "id" => "9108",
                "province_id" => "91",
                "name" => "kabupaten raja ampat",
            ],
            [
                "id" => "9109",
                "province_id" => "91",
                "name" => "kabupaten tambrauw",
            ],
            [
                "id" => "9110",
                "province_id" => "91",
                "name" => "kabupaten maybrat",
            ],
            [
                "id" => "9111",
                "province_id" => "91",
                "name" => "kabupaten manokwari selatan",
            ],
            [
                "id" => "9112",
                "province_id" => "91",
                "name" => "kabupaten pegunungan arfak",
            ],
            [
                "id" => "9171",
                "province_id" => "91",
                "name" => "kota sorong",
            ],
            [
                "id" => "9401",
                "province_id" => "94",
                "name" => "kabupaten merauke",
            ],
            [
                "id" => "9402",
                "province_id" => "94",
                "name" => "kabupaten jayawijaya",
            ],
            [
                "id" => "9403",
                "province_id" => "94",
                "name" => "kabupaten jayapura",
            ],
            [
                "id" => "9404",
                "province_id" => "94",
                "name" => "kabupaten nabire",
            ],
            [
                "id" => "9408",
                "province_id" => "94",
                "name" => "kabupaten kepulauan yapen",
            ],
            [
                "id" => "9409",
                "province_id" => "94",
                "name" => "kabupaten biak numfor",
            ],
            [
                "id" => "9410",
                "province_id" => "94",
                "name" => "kabupaten paniai",
            ],
            [
                "id" => "9411",
                "province_id" => "94",
                "name" => "kabupaten puncak jaya",
            ],
            [
                "id" => "9412",
                "province_id" => "94",
                "name" => "kabupaten mimika",
            ],
            [
                "id" => "9413",
                "province_id" => "94",
                "name" => "kabupaten boven digoel",
            ],
            [
                "id" => "9414",
                "province_id" => "94",
                "name" => "kabupaten mappi",
            ],
            [
                "id" => "9415",
                "province_id" => "94",
                "name" => "kabupaten asmat",
            ],
            [
                "id" => "9416",
                "province_id" => "94",
                "name" => "kabupaten yahukimo",
            ],
            [
                "id" => "9417",
                "province_id" => "94",
                "name" => "kabupaten pegunungan bintang",
            ],
            [
                "id" => "9418",
                "province_id" => "94",
                "name" => "kabupaten tolikara",
            ],
            [
                "id" => "9419",
                "province_id" => "94",
                "name" => "kabupaten sarmi",
            ],
            [
                "id" => "9420",
                "province_id" => "94",
                "name" => "kabupaten keerom",
            ],
            [
                "id" => "9426",
                "province_id" => "94",
                "name" => "kabupaten waropen",
            ],
            [
                "id" => "9427",
                "province_id" => "94",
                "name" => "kabupaten supiori",
            ],
            [
                "id" => "9428",
                "province_id" => "94",
                "name" => "kabupaten mamberamo raya",
            ],
            [
                "id" => "9429",
                "province_id" => "94",
                "name" => "kabupaten nduga",
            ],
            [
                "id" => "9430",
                "province_id" => "94",
                "name" => "kabupaten lanny jaya",
            ],
            [
                "id" => "9431",
                "province_id" => "94",
                "name" => "kabupaten mamberamo tengah",
            ],
            [
                "id" => "9432",
                "province_id" => "94",
                "name" => "kabupaten yalimo",
            ],
            [
                "id" => "9433",
                "province_id" => "94",
                "name" => "kabupaten puncak",
            ],
            [
                "id" => "9434",
                "province_id" => "94",
                "name" => "kabupaten dogiyai",
            ],
            [
                "id" => "9435",
                "province_id" => "94",
                "name" => "kabupaten intan jaya",
            ],
            [
                "id" => "9436",
                "province_id" => "94",
                "name" => "kabupaten deiyai",
            ],
            [
                "id" => "9471",
                "province_id" => "94",
                "name" => "kota jayapura",
            ],
        ];

        return Regency::insert($regencies);
    }
}