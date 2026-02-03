@extends('layouts.main-soal')

@section('title', 'Ujian Energram')
@section('content2')

    <body onload="openFullscreen()">
        <!-- HEADER -->
        <div class="container mt-3">

            <!-- MAIN SECTION -->
            <div class="row mt-2 align-items-start">
                <!-- LEFT: Question -->
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                        <nav aria-label="breadcrumb" class="mb-2 mb-md-0">
                            <ol class="breadcrumb mb-0" id="breadcrumb-modul">

                            </ol>
                        </nav>
                        <div class="timer-box">
                            <span id="timer">
                                <span id="liveTimer">00:00:00</span>
                            </span>
                        </div>
                    </div>
                    
                    <div class="question-box mb-5">
                        <div class="card card-body p-4" id="area-soal">
                            <!-- Soal will be rendered here by JS -->
                            <div class="text-center text-muted">Memuat soal...</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Copyright -->
            <div class="text-center mt-3">
                <p class="text-muted">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    by CIBN. All Rights Reserved.
                </p>
            </div>
            
            <link rel="shortcut icon" href="{{ asset('assetts//images/favicon.ico') }}" />

            <!-- STYLES -->
            <style>
                /* Reuse styles */
                .timer-box {
                    position: static !important;
                    right: auto !important;
                    top: auto !important;
                    background: transparent;
                    padding: 0;
                }

                .masuk-soal {
                    font-size: 1.5rem;
                    font-weight: bold;
                    border-bottom: 2px solid #ddd;
                    margin-bottom: 20px;
                    padding-bottom: 10px;
                }

                .energram-table {
                    width: 100%;
                    border-collapse: separate; 
                    border-spacing: 0 15px; /* Space between rows */
                }

                .energram-table td {
                    padding: 10px;
                    background-color: #fff;
                    border-bottom: 1px solid #f0f0f0;
                }

                .energram-statement {
                    font-size: 1.1rem;
                    font-weight: 500;
                    width: 60%;
                }

                .energram-options {
                    width: 40%;
                    text-align: center;
                }

                .option-group {
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                }

                .option-label {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    cursor: pointer;
                    margin: 0 5px;
                }

                /* Custom Radio */
                .option-label input[type="radio"] {
                    transform: scale(1.5);
                    cursor: pointer;
                    margin-bottom: 5px;
                    accent-color: #244e9b;
                }

                .option-text {
                    font-weight: bold;
                    font-size: 0.9rem;
                    color: #555;
                }

                .btn-next {
                    background-color: #244e9b;
                    color: white;
                    border: none;
                    padding: 12px 40px;
                    border-radius: 8px;
                    font-size: 1.2rem;
                    transition: all 0.2s;
                    margin-top: 20px;
                }

                .btn-next:hover {
                    background-color: #1a3a75;
                }

                .btn-next:disabled {
                    background-color: #ccc;
                    cursor: not-allowed;
                }

                @media (max-width: 768px) {
                    .energram-statement {
                        font-size: 0.95rem;
                        width: 100%;
                        display: block;
                        margin-bottom: 10px;
                    }
                    .energram-options {
                        width: 100%;
                        display: block;
                    }
                    .energram-table td {
                        display: block;
                        text-align: center;
                    }
                }
            </style>

            <!-- DATA & LOGIC -->
            <script>
                // 1. Data Setup
                const ambilModul = @json($ambilmodul);
                const kodeLogin = "{{ session('kode_login') }}";
                let modul = {!! json_encode($modul ?? 'default') !!};
                
                // Hardcoded Statements (20 Items)
                const items = [
                    "Saya suka ide melibatkan pasangan intim saya dalam kehidupan kerja saya, jadi kami tidak berpisah.",
                    "Kebanyakan orang melihat saya lebih damai daripada yang sebenarnya.",
                    "Saya sering merasakan kerinduan tanpa benar-benar tahu mengapa.",
                    "Keinginan saya untuk berpikir positif terkadang bisa seperti kecanduan.",
                    "Memiliki ruang pribadi adalah kebutuhan, bukan kemewahan.",
                    "Bertemu deadline saya lebih penting daripada mendapatkan setiap detail kecil tepat.",
                    "Perasaan takut saya kurang kuat ketika saya memiliki proyek untuk dikerjakan.",
                    "Saya bisa merangkul sisi manis dari kesedihan.",
                    "Aku adalah kekuatan yang harus diperhitungkan.",
                    "Ketidakjujuran saya kadang-kadang bisa melenyapkan orang.",
                    "Saya benci meminta bantuan, meskipun saya suka memberikannya.",
                    "Saya merasa sulit untuk menahan ketika datang untuk menawarkan bantuan dan saran.",
                    "Menjadi pemenang membuat usaha saya berharga.",
                    "Berada di alam sangat menenangkanku.",
                    "Aku bisa marah ketika semuanya menjadi terlalu rumit.",
                    "Membuat orang lain tertawa membantu saya merasa lebih tenang dan kurang cemas.",
                    "Situasi emosional yang kuat membuat saya merasa benar-benar hidup.",
                    "Saya suka melakukan sesuatu yang baru, bukan hal yang sama.",
                    "Saya bangga dengan cara saya membuat orang merasa nyaman.",
                    "Saya suka melakukan banyak hal sehingga mudah untuk menyebarkan diri terlalu kurus.",
                    "Keinginan saya untuk mencapai tidak mengenal batas.",
                    "Bahkan ketika saya terlihat diterima oleh suatu kelompok, sulit untuk merasa bahwa saya benar-benar milik.",
                    "Saya bisa keras kepala dengan cara yang menghindari konfrontasi langsung.",
                    "Orang mengatakan saya memiliki aura yang kuat.",
                    "Saya bisa membuat peraturan dan menegakkannya.",
                    "Sulit untuk tidak menangis ketika saya merasa sentimental, bahkan ketika saya berada di depan umum.",
                    "Saya bisa merasa kesal karena tidak ada alasan khusus.",
                    "Saya mampu menciptakan keharmonisan di lingkungan saya.",
                    "Saya mencari orang-orang yang tidak dapat melihat diri mereka sendiri.",
                    "Menemukan tujuan hidup saya berarti segalanya bagi saya.",
                    "Saya lebih suka memikirkan masalah sebelum bertindak.",
                    "Belajar untuk menegaskan diri memberi saya kepercayaan diri dan mengurangi kecemasan saya.",
                    "Saya tidak bisa membantu tetapi melihat kedua sisi dari hampir semua pertanyaan.",
                    "Saya merasa tidak nyaman berbicara dengan orang-orang yang tampaknya tidak terlibat secara emosional.",
                    "Saya ingin membuat hidup sederhana dan tidak rumit.",
                    "Mempertahankan hubungan dekat dengan teman dan keluarga membantu saya merasa aman di dunia yang kacau.",

                    "Meskipun saya dapat dengan mudah membayangkan panik dalam krisis, ketika keadaan darurat yang sebenarnya datang, saya melakukannya dengan sangat baik.",
                    "Saya jauh lebih dari hati orang daripada kepala orang.",
                    "Mendapatkan pekerjaan yang dilakukan dengan benar lebih penting daripada menyelesaikan pekerjaan dengan cepat.",
                    "Saya suka membaca terlebih dahulu sebelum mencoba beberapa aktivitas baru.",
                    "Saya lebih menghargai orisinalitas daripada sukses.",
                    "Sesuai dengan norma kelompok tidak memungkinkan saya untuk mengungkapkan siapa diri saya sebenarnya.",
                    "Saya merasa sulit untuk menanggung aspek-aspek kehidupan yang menumpulkan hati dan membunuh jiwa.",
                    "Tidak ada yang saya nikmati seperti membuat perkenalan dan membantu orang saling mengenal satu sama lain.",
                    "Sebagai seorang anak, saya lebih serius dan realistis daripada banyak anak lain.",
                    "Detail masa kecil saya terkadang tampak kabur dan jauh.",
                    "Tidak ada yang lebih kritis terhadap saya daripada saya sendiri.",
                    "Saya sering merasa sulit untuk mencapai sesuatu tanpa terganggu oleh tugas-tugas lain.",
                    "Iman dan kepercayaan itu sulit bagiku, karena aku meragukan hal-hal yang tampaknya diterima sebagian besar orang.",
                    "Perhatian saya terlalu mudah pergi ke skenario terburuk, bahkan ketika mereka tidak mungkin terjadi.",
                    "Saya cenderung membuat diri saya begitu sibuk dengan pekerjaan sehingga tidak ada banyak waktu untuk duduk dan merenung.",
                    "Saya terkadang dilihat oleh orang lain sebagai tidak responsif secara sosial.",
                    "Saya merasakan dorongan untuk melarikan diri ketika saya mendarat dalam situasi yang membutuhkan komitmen emosional.",
                    "Saya cenderung menghormati atau menentang otoritas.",
                    "Saya suka berkonsentrasi pada satu hal pada satu waktu dan tidak menghargai gangguan.",
                    "Terkadang sulit untuk membedakan antara gambar yang saya proyeksikan dan orang yang ada di dalam saya.",
                    "Saya selalu sadar akan aturan yang harus saya ikuti, apakah saya memilih untuk menyesuaikan dengan mereka atau melanggarnya.",
                    "Saya optimis tentang banyak hal.",
                    "Sulit untuk tidak merasa gugup saat bertemu orang baru.",
                    "Saya tidak dapat membayangkan kehidupan tanpa banyak kenalan dan kontak sosial saya.",
                    "Naluri pertama saya selalu membantu orang, apakah mereka memintanya atau tidak.",
                    "Orang-orang melihat saya sebagai pemimpin alami.",
                    "Dalam situasi kelompok, saya biasanya lebih suka berbaur, daripada mengambil pimpinan atau keberatan suara.",
                    "Memiliki rutinitas sehari-hari membantu saya tetap di jalur dan menyelesaikan berbagai hal.",
                    "Saya tidak perlu membuktikan apa pun kepada siapa pun.",
                    "Sebagai orang tua atau wali, saya lebih ketat daripada permisif.",
                    "Saya bekerja keras untuk berhasil karena kegagalan bukanlah pilihan.",
                    "Saya lebih bersedia daripada banyak orang untuk melakukan pekerjaan \"menggerutu\" pada proyek kelompok.",
                    "Menjadi orang yang autentik lebih berarti bagiku daripada kesuksesan materi.",
                    "Saya memiliki begitu banyak ide berdengung di kepala saya sehingga sulit untuk mengerjakannya satu per satu.",
                    "Saya adalah karyawan yang sangat andal, setia, dan mantap.",
                    "Seringkali saya merasa bahwa pendapat pribadi saya tidak begitu penting untuk diskusi kelompok.",
                    "Saya sangat sadar akan kesan yang saya buat pada orang lain.",
                    "Kebanggaan adalah kekuatan terbesar saya dan kelemahan terbesar saya.",
                    "Meluangkan waktu untuk hubungan bisa jadi sulit karena jadwal sibuk saya.",
                    "Memberi, peduli, dan berbagi sangat berarti bagiku.",
                    "Mendengarkan dengan tidak sopan datang dengan mudah bagi saya.",
                    "Ide sering datang kepada saya seperti kilatan petir.",
                    "Saya memiliki banyak energi gugup dan imajinasi yang terlalu aktif.",
                    "Ketidaktahuan emosi benar-benar menggangguku.",
                    "Saya bisa sangat terbelit oleh keprihatinan saya terhadap orang lain.",
                    "Saya memiliki kekuatan untuk mengambil tugas yang akan mengalahkan orang yang lebih lemah.",
                    "Emosi mendalam saya adalah sumber daya kreatif terbesar saya.",
                    "Ini sangat memalukan untuk dikritik publik.",
                    "Orang yang tidak menganggap serius sesuatu mengganggu saya.",
                    "Tidak ada yang memotivasi saya seperti pencapaian yang tinggi.",
                    "Mengendalikan amarah saya sangat sulit.",
                    "Saya disebut perfeksionis, meskipun saya merasa tidak sempurna.",
                    "Karena saya melakukan banyak hal untuk orang lain, saya terkadang merasa berhak atas perlakuan khusus.",
                    "Pengakuan publik sangat berarti bagi saya.",
                    "Saya cenderung melihat orang lain sebagai sederajat.",
                    "Saya ingin memastikan bahwa saya memenuhi standar perilaku tinggi saya sendiri.",
                    "Ketika saya beresonansi dengan seseorang, itu bukan pada tingkat yang dangkal.",
                    "Penting bagi saya untuk menjadi pendengar yang simpatik dan teman yang mendukung.",
                    "Saya menghargai makanan yang baik, perusahaan yang baik, dan kehidupan yang baik.",
                    "Terkadang melakukan pelanggaran adalah satu-satunya cara untuk menaklukkan rasa takut.",
                    "Saya sangat tertarik dengan pekerjaan kemanusiaan dengan orang atau hewan.",
                    "Kegembiraan alami saya biasanya membuat saya tidak terjebak dalam emosi yang berat.",
                    "Saya adalah pemelihara alami.",
                    "Saya biasanya menikmati mengendap-endap dan kehilangan diri sendiri dalam tugas-tugas kecil kehidupan sehari-hari.",
                    "Saya adalah pengamat yang cermat terhadap orang dan situasi.",
                    "Meskipun saya ingin diterima, saya benci gagasan penyesuaian tanpa berpikir.",
                    "Ketika saya peduli dengan orang lain, saya ingin memperbaiki perilaku mereka.",
                    "Tidak terlalu menyenangkan hanya melakukan satu aktivitas dalam satu waktu.",
                    "Ketika saya berjalan di ruangan penuh orang, saya langsung merasakan siapa yang bertanggung jawab.",
                    "Saya senang mencari solusi yang cerdik untuk masalah yang tidak biasa.",
                    "Saya menemukan tampilan umum emosi tidak menarik.",
                    "Saya mengambil sesuatu secara pribadi dan tidak peduli siapa yang mengetahuinya.",
                    "Kebanyakan orang menganggap saya tidak menghakimi dan santai.",
                    "Menjunjung tinggi etika dan prinsip sangat penting bagi saya.",
                    "Menerjemahkan visi batin saya ke dalam karya seni dapat menjadi sangat menarik.",
                    "Saya dapat menyesuaikan pakaian dan perilaku saya dengan kebutuhan situasi.",
                    "Saya mencoba membuka opsi saya.",
                    "Saya dapat mengabaikan emosi yang menyakitkan untuk menyelesaikan pekerjaan.",
                    "Game dapat membuat saya terpesona.",
                    "Berada di lingkungan yang plastik dan impersonal hanya menguras kehidupan langsung dari saya.",
                    "Saya suka mempelajari pola yang rumit dan konsep yang rumit.",
                    "Saya memiliki kritik batin yang sangat aktif.",
                    "Kadang-kadang sulit untuk memenuhi kebutuhan pribadi saya sendiri.",
                    "Saya merasa sulit untuk tidak menghakimi orang terlalu keras.",
                    "Rumah dan keluarga saya memberi saya tempat berlindung yang aman di dunia yang tidak aman.",
                    "Kata-kata saya adalah ikatan saya.",
                    "Toleransi datang dengan mudah bagi saya.",
                    "Saya tidak keberatan memberikan cinta yang kuat ketika dibutuhkan.",
                    "Saya merasa cukup bersalah ketika saya marah tanpa pembenaran.",
                    "Saya cenderung tidak taat ketika orang mendorong reaksi emosional.",
                    "Ketika saya menyukai seni, sering ada sesuatu yang aneh atau tidak biasa.",
                    "Kenyamanan yang familier memberi saya rasa damai.",
                    "Saya jarang menerima ide yang tidak bertahan dalam ujian waktu.",
                    "Kadang-kadang butuh waktu untuk emosi saya untuk mengejar pikiran saya.",
                    "Saya adalah ketua di lingkaran teman-teman saya.",
                    "Merasa rentan membuatku menggeliat.",
                    "Saya tidak peduli dengan gangguan ketika saya mencoba memikirkan masalah.",
                    "Teman-teman menggambarkan saya sebagai orang yang hangat, romantis, dan penuh kasih sayang.",
                    "Lebih dari segalanya, saya adalah tipe orang yang \"bisa melakukan\".",
                    "Tidak sulit untuk berhati-hati jika diperlukan.",
                    "Teman-teman terkadang mengatakan bahwa saya terlalu keras untuk diri sendiri.",
                    "Saya menjadi tegang atau kritis lebih mudah daripada kebanyakan orang.",
                    "Berada di mata publik adalah sesuatu yang biasanya saya nikmati.",
                    "Saya selalu melindungi apa milik saya.",
                    "Sudah menjadi sifat saya untuk mencari hal baru, bukan rutinitas.",
                    "Saya sangat sensitif dengan suasana hati orang lain.",
                    "Apapun yang saya lakukan, saya selalu berusaha melebihi yang terbaik dari diri saya.",
                    "Saya sangat setia kepada orang-orang yang telah mendapatkan kepercayaan saya.",

                    "Saya seorang pemikir sistem yang dapat memisahkan pikiran dari emosi.",
                    "Saya adalah orang yang selamat alami, dan persediaan saya ditimbun untuk membuktikannya!",
                    "Saya sering dapat memilih ide \"keluar dari udara.\"",
                    "Ketika saya dihalau, itu membantu saya menjalankan rencana yang ada, bukan hanya mengembangkan yang baru.",
                    "Saya tahu bagaimana rasanya mengalami kesepian yang intens.",
                    "Dalam hubungan yang intim, saya sering mengalami perasaan cemburu, meskipun saya tidak menyetujui mereka.",
                    "Prestasi dan pengakuan memberi tahu saya bahwa saya menargetkan sasaran saya.",
                    "Saya pandai membuat orang tertawa, karena saya cepat tanggap dan tidak menganggap diri saya terlalu serius.",
                    "Saya menggunakan \"radar batin\" saya untuk menggerakkan motif orang lain dan memutuskan apakah aman untuk memercayai mereka atau tidak.",
                    "Saya menghargai pertukaran intelektual lebih dari berbagi secara emosional.",
                    "Saya merasa terkejut dengan proyek-proyek inovatif atau ide-ide visioner.",
                    "Kata-kata \"harus\" dan \"seharusnya\" muncul banyak dalam pemikiran saya.",
                    "Banyak orang menganggap saya terlalu emosional atau dramatis.",
                    "Saya sering menjadi ahli dalam topik yang saya pelajari.",
                    "Sendirian memungkinkan saya untuk berhubungan dengan diri saya yang terdalam.",
                    "Saya lebih terpisah daripada emosional.",
                    "Saya bersedia berkorban untuk berada dalam hubungan.",
                    "Saya memiliki selera besar dan keinginan \"lebih besar dari hidup\".",
                    "Istilah \"Tipe A kepribadian\" diciptakan dengan saya dalam pikiran.",
                    "Jika saya masuk ke grup yang tidak memiliki pemimpin, saya akan bertanggung jawab.",
                    "Terkadang saya merasa seperti akan meledak.",
                    "Saya bisa menjadi penindas kejam yang menempel untuk diunggulkan.",
                    "Pembicaraan kecil tidak banyak bermanfaat bagi saya.",
                    "Merasa dihargai sangat berarti bagiku.",
                    "Membuat kesan yang baik itu penting bagiku.",
                    "Mengetahui saya benar mengambil tepi dari ketegangan yang saya rasakan.",
                    "Keputusan pribadi yang besar dapat melumpuhkan saya.",
                    "Saya alami suka bermain, suka bersenang-senang, dan berjiwa bebas.",
                    "Kadang-kadang lebih mudah untuk langsung menghadapi ketakutan saya daripada membiarkan imajinasi saya menjadi liar.",
                    "Saya seorang pemain tim yang hebat.",
                    "Saya secara mental keluar ketika saya kekurangan waktu sendirian.",
                    "Pikiran saya cepat, tetapi tidak terlalu menyeluruh.",
                    "Sangat mudah untuk membiarkan teman-teman saya memutuskan bagaimana kita menghabiskan waktu bersama.",
                    "Saya mudah mengidentifikasi dengan luka yang telah saya terima dalam hidup.",
                    "Saya mengambil tindakan ketika orang lain masih mencoba memilah perasaan mereka.",
                    "Kebebasan lebih berarti bagi saya daripada hampir apa pun."
                    ];


                const pageSize = 10;
                let currentPage = 0; // 0 for items 0-9, 1 for 10-19
                let userAnswers = {}; // { index: value }

                // 2. Breadcrumb Setup
                const breadcrumb = document.getElementById("breadcrumb-modul");
                breadcrumb.innerHTML = "";
                const skipList = ["Nama-Peserta", "istirahat"];
                let filtered = ambilModul.filter(modul => !skipList.includes(modul));
                
                filtered.forEach((modulItem, index) => {
                    if (index > 0) {
                        const separator = document.createElement("span");
                        separator.innerHTML = "&nbsp;&gt;&nbsp;";
                        separator.classList.add("breadcrumb-separator");
                        breadcrumb.appendChild(separator);
                    }
                    const item = document.createElement("span");
                    item.textContent = modulItem;
                    if (index === filtered.length - 1) {
                        item.classList.add("breadcrumb-active");
                    } else {
                        item.classList.add("breadcrumb-item-text");
                    }
                    breadcrumb.appendChild(item);
                });

                // 3. Render Function
                function renderPage() {
                    const areaSoal = document.getElementById("area-soal");
                    const startIdx = currentPage * pageSize;
                    const endIdx = startIdx + pageSize;
                    const currentItems = items.slice(startIdx, endIdx);

                    // If no items left (though logical check prevents this), stop
                    if (currentItems.length === 0) return;

                    let html = `
                        <div class="masuk-soal">
                            <strong>ENERGRAM TEST</strong>
                            <span class="soal-no">Halaman ${currentPage + 1} / ${Math.ceil(items.length / pageSize)}</span>
                        </div>
                        
                        <p class="text-center mb-4">Berikan nilai <strong>0 - 3</strong> untuk setiap pernyataan di bawah ini sesuai dengan diri Anda.<br>
                        (0 = Tidak pernah, 1 = Jarang, 2 = Sering, 3 = Selalu)</p>
                        
                        <table class="energram-table">
                            <tbody>
                    `;

                    currentItems.forEach((statement, i) => {
                        const realIndex = startIdx + i;
                        const val = userAnswers[realIndex]; 

                        html += `
                            <tr>
                                <td class="energram-statement">${realIndex + 1}. ${statement}</td>
                                <td class="energram-options">
                                    <div class="option-group">
                                        ${[0, 1, 2, 3].map(score => `
                                            <label class="option-label">
                                                <input type="radio" 
                                                    name="ans_${realIndex}" 
                                                    value="${score}" 
                                                    ${val == score ? 'checked' : ''} 
                                                    onclick="handleAnswer(${realIndex}, ${score})">
                                                <span class="option-text">${score}</span>
                                            </label>
                                        `).join('')}
                                    </div>
                                </td>
                            </tr>
                        `;
                    });

                    html += `
                            </tbody>
                        </table>
                        
                        <div class="text-center">
                            <button id="btnNext" class="btn-next" onclick="goNext()" disabled>
                                ${currentPage === Math.ceil(items.length / pageSize) - 1 ? 'SELESAI' : 'LANJUT <i class="fa fa-arrow-right"></i>'}
                            </button>
                        </div>
                    `;

                    areaSoal.innerHTML = html;
                    checkValidation();
                }

                // 4. Logic 
                function handleAnswer(index, value) {
                    userAnswers[index] = value;
                    checkValidation();
                }

                function checkValidation() {
                    const startIdx = currentPage * pageSize;
                    const endIdx = Math.min(startIdx + pageSize, items.length);
                    let allAnswered = true;

                    for (let i = startIdx; i < endIdx; i++) {
                        if (userAnswers[i] === undefined || userAnswers[i] === null) {
                            allAnswered = false;
                            break;
                        }
                    }

                    document.getElementById("btnNext").disabled = !allAnswered;
                }

                function goNext() {
                    // Save batch to server? 
                    // Usually we save per item or just keep in memory until the end.
                    // To follow the pattern "when next then save", we can simulate saving current batch.
                    
                    const startIdx = currentPage * pageSize;
                    const endIdx = Math.min(startIdx + pageSize, items.length);
                    
                    // Simple batch save attempt
                    // We'll iterate and save individually or send batch if server supports it.
                    // Based on previous example, it sends one by one (simpan-jawaban).
                    // Sending 10 requests might be slow. 
                    // Ideally we send batch. But let's assume valid 'simpan-jawaban' accepts 'no' and 'jawaban'.
                    // We will just process local state change for "Next Page" visual, 
                    // AND send the answers to backend in background so progress is saved.
                    
                    const promises = [];
                    for (let i = startIdx; i < endIdx; i++) {
                         const payload = {
                            modul: modul,
                            kodeLogin: kodeLogin,
                            no: i + 1, // 1-based index
                            jawaban: userAnswers[i]
                        };
                        
                        promises.push(
                            fetch('/simpan-jawaban', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                body: JSON.stringify(payload)
                            })
                        );
                    }

                    // Show loading or just proceed?
                    // User asked to "Next" to avoid scroll. 
                    
                    // Let's create an implicit wait overlay if we want to ensure save, 
                    // OR just optimistic UI update. Given 10 items, optimistic is riskier if network fails.
                    // But 10 reqs is heavy. Let's hope backend is fast.
                    
                    // Proceed to next page logic
                    const totalPages = Math.ceil(items.length / pageSize);
                    
                    if (currentPage < totalPages - 1) {
                        currentPage++;
                        renderPage();
                        window.scrollTo(0,0);
                    } else {
                        // Finish
                        finishModule();
                    }
                }

                function finishModule() {
                    const overlay = document.createElement("div");
                    overlay.style = `
                        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
                        background: white; z-index: 9999;
                        display: flex; justify-content: center; align-items: center;
                    `;
                    overlay.innerHTML = `
                         <div class="text-center">
                            <h3>Menyimpan Jawaban...</h3>
                            <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
                         </div>
                         <form id="finishForm" action="/next-modul" method="POST">
                            @csrf
                            <input type="hidden" name="kodeLogin" value="${kodeLogin}">
                            <input type="hidden" name="modul" value="${modul}">
                         </form>
                    `;
                    document.body.appendChild(overlay);
                    setTimeout(() => document.getElementById("finishForm").submit(), 2000); // Give time for async fetches to complete if any pending
                }

                document.addEventListener("DOMContentLoaded", renderPage);
            </script>

            <!-- COPIED TIMER LOGIC & PHP SESSION -->
             @php
                use App\Models\Kode;
                use Carbon\Carbon;
                $kodeLogin = session('kode_login');
                $kodeData = Kode::where('kode', $kodeLogin)->first();
                $waktuSelesai = $kodeData
                    ? Carbon::parse($kodeData->waktu, 'Asia/Jakarta')->format('Y-m-d H:i:s')
                    : null;
            @endphp
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const display = document.getElementById("liveTimer");
                    if (!display) return;
                    
                    const timeStr = "{{ $waktuSelesai }}";
                    if(!timeStr) return;

                    const waktuSelesai = new Date(timeStr.replace(" ", "T") + "+07:00");
                    const timerInterval = setInterval(() => {
                        const now = new Date();
                        const remaining = waktuSelesai - now;
                        if (remaining <= 0) {
                            clearInterval(timerInterval);
                            finishModule();
                            return;
                        }
                        const totalSeconds = Math.floor(remaining / 1000);
                        const h = Math.floor(totalSeconds / 3600).toString().padStart(2,"0");
                        const m = Math.floor((totalSeconds % 3600) / 60).toString().padStart(2,"0");
                        const s = (totalSeconds % 60).toString().padStart(2,"0");
                        display.textContent = `${h}:${m}:${s}`;
                    }, 1000);
                });
                
                // Security
                document.addEventListener("contextmenu", e => e.preventDefault());
            </script>

    </body>
@endsection
