<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal Harian</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            padding: 20px;
            display: flex;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            max-width: 1300px;
            width: 100%;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #1a3a5c;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 28px;
        }

        .subtitle {
            text-align: center;
            color: #6b7a8f;
            margin-bottom: 24px;
            font-size: 14px;
            border-bottom: 2px solid #e9edf2;
            padding-bottom: 16px;
        }

        /* Tools Bar */
        .tools-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: space-between;
            margin-bottom: 20px;
            background: #f8fafc;
            padding: 14px 18px;
            border-radius: 12px;
            align-items: center;
        }

        .filter-section {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-section label {
            font-weight: 500;
            color: #2c3e50;
            font-size: 14px;
        }

        .filter-section input[type="date"] {
            padding: 6px 12px;
            border: 1px solid #d1d9e6;
            border-radius: 8px;
            font-size: 14px;
            background: white;
        }

        .btn {
            padding: 8px 18px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-primary {
            background: #1a3a5c;
            color: white;
        }
        .btn-primary:hover {
            background: #0f2a44;
        }

        .btn-success {
            background: #1e7e34;
            color: white;
        }
        .btn-success:hover {
            background: #15632a;
        }

        .btn-danger {
            background: #b02a37;
            color: white;
        }
        .btn-danger:hover {
            background: #8f212c;
        }

        .btn-outline {
            background: transparent;
            border: 1.5px solid #1a3a5c;
            color: #1a3a5c;
        }
        .btn-outline:hover {
            background: #1a3a5c;
            color: white;
        }

        .btn-voice {
            background: #6f42c1;
            color: white;
            padding: 8px 20px;
        }
        .btn-voice:hover {
            background: #5a32a3;
        }
        .btn-voice.listening {
            background: #dc3545;
            animation: pulse 1.2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); }
            100% { transform: scale(1); }
        }

        .btn-excel {
            background: #1d6f42;
            color: white;
        }
        .btn-excel:hover {
            background: #145530;
        }

        .btn-sm {
            padding: 4px 10px;
            font-size: 12px;
            border-radius: 6px;
        }

        .btn-danger-sm {
            background: #dc3545;
            color: white;
            border: none;
            cursor: pointer;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
        }
        .btn-danger-sm:hover {
            background: #b02a37;
        }

        /* Table */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            min-width: 700px;
        }

        thead {
            background: #1a3a5c;
            color: white;
        }

        th {
            padding: 14px 12px;
            text-align: left;
            font-weight: 600;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #e9edf2;
            vertical-align: top;
        }

        tr:hover td {
            background: #f8faff;
        }

        .col-tanggal { width: 11%; }
        .col-jam { width: 11%; }
        .col-kegiatan { width: 43%; }
        .col-dokumentasi { width: 18%; }
        .col-aksi { width: 17%; }

        input[type="text"], input[type="date"], input[type="time"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #d1d9e6;
            border-radius: 8px;
            font-size: 13px;
            background: white;
            transition: 0.2s;
        }

        input[type="text"]:focus, input[type="date"]:focus, input[type="time"]:focus {
            border-color: #1a3a5c;
            outline: none;
            box-shadow: 0 0 0 3px rgba(26, 58, 92, 0.15);
        }

        textarea {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #d1d9e6;
            border-radius: 8px;
            font-size: 13px;
            resize: vertical;
            min-height: 44px;
            font-family: inherit;
            background: white;
        }

        textarea:focus {
            border-color: #1a3a5c;
            outline: none;
            box-shadow: 0 0 0 3px rgba(26, 58, 92, 0.15);
        }

        .badge-doc {
            background: #e9edf2;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 12px;
            color: #2c3e50;
            display: inline-block;
        }

        .empty-row td {
            text-align: center;
            color: #8a9aa8;
            padding: 30px 0;
            font-style: italic;
        }

        /* Pagination */
        .pagination-bar {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            padding: 12px 6px 0 6px;
            margin-top: 8px;
            gap: 12px;
        }

        .pagination-info {
            font-size: 14px;
            color: #2c3e50;
        }

        .pagination-buttons {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .pagination-buttons button {
            padding: 6px 14px;
            border: 1px solid #d1d9e6;
            background: white;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            font-size: 13px;
            transition: 0.2s;
            color: #1a3a5c;
        }

        .pagination-buttons button:hover:not(:disabled) {
            background: #1a3a5c;
            color: white;
            border-color: #1a3a5c;
        }

        .pagination-buttons button.active {
            background: #1a3a5c;
            color: white;
            border-color: #1a3a5c;
        }

        .pagination-buttons button:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .total-row {
            background: #f8fafc;
            font-weight: 600;
        }
        .total-row td {
            padding: 10px 12px;
        }

        /* Toast */
        .toast {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #1a3a5c;
            color: white;
            padding: 14px 24px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
            font-weight: 500;
            opacity: 0;
            transform: translateY(20px);
            transition: 0.3s;
            pointer-events: none;
            z-index: 999;
            max-width: 90%;
        }
        .toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .container { padding: 14px; }
            .tools-bar { flex-direction: column; align-items: stretch; }
            .filter-section { flex-wrap: wrap; }
            th, td { padding: 8px 6px; font-size: 13px; }
            .pagination-bar { flex-direction: column; align-items: stretch; text-align: center; }
            .pagination-buttons { justify-content: center; }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📋 Jurnal Harian Tenaga Kependidikan</h1>
    <p class="subtitle">Catatan kegiatan harian · Voice-to-Text · Filter Rentang Tanggal · Pagination 20</p>

    <!-- Tools -->
    <div class="tools-bar">
        <div class="filter-section">
            <label for="filterTglMulai">📅 Dari:</label>
            <input type="date" id="filterTglMulai">
            <label for="filterTglSelesai">Sampai:</label>
            <input type="date" id="filterTglSelesai">
            <button class="btn btn-primary btn-sm" onclick="applyFilter()">🔍 Tampilkan</button>
            <button class="btn btn-outline btn-sm" onclick="resetFilter()">↺ Reset</button>
        </div>
        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <button class="btn btn-success" onclick="tambahBaris()">+ Tambah Baris</button>
            <button class="btn btn-voice" id="voiceBtn" onclick="toggleVoice()">🎤 Voice to Text</button>
            <button class="btn btn-excel" onclick="exportExcel()">⬇ Ekspor Excel</button>
        </div>
    </div>

    <!-- Table -->
    <div class="table-wrapper">
        <table id="jurnalTable">
            <thead>
                <tr>
                    <th class="col-tanggal">📅 Tanggal</th>
                    <th class="col-jam">⏰ Jam</th>
                    <th class="col-kegiatan">📝 Uraian Kegiatan / Catatan</th>
                    <th class="col-dokumentasi">📎 Dokumentasi (opsional)</th>
                    <th class="col-aksi">⚙ Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- Data akan diisi oleh JavaScript -->
            </tbody>
            <tfoot id="tableFoot">
                <tr class="total-row">
                    <td colspan="5" style="text-align:right; padding-right:20px;" id="totalRow">
                        Total entri: 0
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination-bar">
        <div class="pagination-info" id="paginationInfo">Menampilkan 0-0 dari 0 data</div>
        <div class="pagination-buttons" id="paginationButtons"></div>
    </div>

    <p style="margin-top:16px; font-size:13px; color:#6b7a8f; text-align:center;">
        💡 Klik <strong>🎤 Voice to Text</strong> lalu bicarakan isi jurnal. Hasil masuk ke kolom Catatan baris aktif.<br>
        ⌨ <strong>Ctrl+Shift+V</strong> untuk voice · <strong>Ctrl+Shift+N</strong> tambah baris
    </p>
</div>

<!-- Toast -->
<div class="toast" id="toast"></div>

<script>
    // ========== DATA ==========
    let data = [];
    let editingId = null;
    let nextId = 1;

    // Pagination state
    let currentPage = 1;
    const PER_PAGE = 20;
    let filteredData = [];

    // Default sample data (40 data untuk demo pagination)
    function generateSampleData() {
        const samples = [];
        const activities = [
            'Membuka ruangan, mengecek kelengkapan administrasi harian.',
            'Mengikuti rapat koordinasi persiapan ujian semester di ruang guru.',
            'Melayani perpanjangan buku perpustakaan (3 siswa).',
            'Pengecekan inventaris lab komputer (unit 5-8 rusak).',
            'Menginput nilai rapor ke aplikasi Dapodik.',
            'Menyusun laporan bulanan untuk kepala sekolah.',
            'Memperbaiki jaringan internet di ruang guru.',
            'Mendampingi siswa lomba di tingkat kabupaten.',
            'Membersihkan dan merawat alat laboratorium biologi.',
            'Mengarsipkan surat masuk dan surat keluar.'
        ];
        const docs = ['-', 'Foto rapat', 'Dokumentasi kegiatan', 'Foto kerusakan', 'Lampiran surat'];
        
        for (let i = 0; i < 40; i++) {
            const d = new Date(2026, 7, 2 + i % 10);
            const tanggal = d.toISOString().split('T')[0];
            const jam = String(7 + (i % 8)).padStart(2,'0') + ':00 - ' + String(8 + (i % 8)).padStart(2,'0') + ':00';
            samples.push({
                id: nextId++,
                tanggal: tanggal,
                jam: jam,
                kegiatan: activities[i % activities.length] + (i % 3 === 0 ? ' (catatan tambahan)' : ''),
                dokumentasi: docs[i % docs.length]
            });
        }
        return samples;
    }

    // ========== INIT ==========
    function init() {
        const saved = localStorage.getItem('jurnalData');
        if (saved) {
            try {
                const parsed = JSON.parse(saved);
                if (parsed.length > 0) {
                    data = parsed;
                    nextId = Math.max(...data.map(d => d.id)) + 1;
                    applyFilter();
                    return;
                }
            } catch(e) {}
        }
        data = generateSampleData();
        nextId = Math.max(...data.map(d => d.id)) + 1;
        applyFilter();
        saveToLocal();
    }

    function saveToLocal() {
        localStorage.setItem('jurnalData', JSON.stringify(data));
    }

    // ========== FILTER ==========
    function applyFilter() {
        const tglMulai = document.getElementById('filterTglMulai').value;
        const tglSelesai = document.getElementById('filterTglSelesai').value;

        filteredData = data.filter(d => {
            if (tglMulai && d.tanggal < tglMulai) return false;
            if (tglSelesai && d.tanggal > tglSelesai) return false;
            return true;
        });

        // Sort by tanggal descending (terbaru di atas)
        filteredData.sort((a, b) => b.tanggal.localeCompare(a.tanggal) || a.jam.localeCompare(b.jam));

        currentPage = 1;
        renderTable();
        renderPagination();
        saveToLocal();
    }

    function resetFilter() {
        document.getElementById('filterTglMulai').value = '';
        document.getElementById('filterTglSelesai').value = '';
        applyFilter();
        showToast('Filter direset.');
    }

    // ========== PAGINATION ==========
    function getPaginatedData() {
        const start = (currentPage - 1) * PER_PAGE;
        const end = start + PER_PAGE;
        return filteredData.slice(start, end);
    }

    function getTotalPages() {
        return Math.ceil(filteredData.length / PER_PAGE) || 1;
    }

    function renderPagination() {
        const total = filteredData.length;
        const totalPages = getTotalPages();
        const start = (currentPage - 1) * PER_PAGE + 1;
        const end = Math.min(currentPage * PER_PAGE, total);

        document.getElementById('paginationInfo').textContent = 
            total > 0 ? `Menampilkan ${start}-${end} dari ${total} data` : 'Tidak ada data';

        const container = document.getElementById('paginationButtons');
        let html = '';

        html += `<button onclick="goToPage(${currentPage - 1})" ${currentPage <= 1 ? 'disabled' : ''}>◀ Prev</button>`;

        // Tampilkan maksimal 7 nomor halaman
        let startPage = Math.max(1, currentPage - 3);
        let endPage = Math.min(totalPages, currentPage + 3);
        if (endPage - startPage < 6) {
            if (startPage === 1) endPage = Math.min(totalPages, startPage + 6);
            else if (endPage === totalPages) startPage = Math.max(1, endPage - 6);
        }

        if (startPage > 1) {
            html += `<button onclick="goToPage(1)">1</button>`;
            if (startPage > 2) html += `<button disabled>…</button>`;
        }

        for (let i = startPage; i <= endPage; i++) {
            html += `<button onclick="goToPage(${i})" class="${i === currentPage ? 'active' : ''}">${i}</button>`;
        }

        if (endPage < totalPages) {
            if (endPage < totalPages - 1) html += `<button disabled>…</button>`;
            html += `<button onclick="goToPage(${totalPages})">${totalPages}</button>`;
        }

        html += `<button onclick="goToPage(${currentPage + 1})" ${currentPage >= totalPages ? 'disabled' : ''}>Next ▶</button>`;

        container.innerHTML = html;
    }

    function goToPage(page) {
        const totalPages = getTotalPages();
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        renderTable();
        renderPagination();
        // Scroll ke atas tabel
        document.querySelector('.table-wrapper').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    // ========== RENDER ==========
    function renderTable() {
        const tbody = document.getElementById('tableBody');
        const pageData = getPaginatedData();

        if (pageData.length === 0) {
            tbody.innerHTML = `<tr class="empty-row"><td colspan="5">Tidak ada data untuk rentang tanggal ini. Klik "Tambah Baris" untuk menambahkan.</td></tr>`;
            document.getElementById('totalRow').textContent = `Total entri: ${filteredData.length}`;
            return;
        }

        let html = '';
        pageData.forEach((item) => {
            const isEditing = (editingId === item.id);
            if (isEditing) {
                html += `
                    <tr>
                        <td><input type="date" id="edit_tanggal_${item.id}" value="${item.tanggal}"></td>
                        <td><input type="text" id="edit_jam_${item.id}" value="${item.jam}" placeholder="07:30 - 08:00"></td>
                        <td><textarea id="edit_kegiatan_${item.id}" rows="2" placeholder="Uraian kegiatan...">${item.kegiatan}</textarea></td>
                        <td><input type="text" id="edit_dokumentasi_${item.id}" value="${item.dokumentasi}" placeholder="(opsional)"></td>
                        <td>
                            <button class="btn btn-success btn-sm" onclick="saveEdit(${item.id})">💾 Simpan</button>
                            <button class="btn btn-outline btn-sm" onclick="cancelEdit()">Batal</button>
                        </td>
                    </tr>
                `;
            } else {
                html += `
                    <tr>
                        <td>${item.tanggal}</td>
                        <td>${item.jam}</td>
                        <td>${item.kegiatan}</td>
                        <td>${item.dokumentasi && item.dokumentasi !== '-' ? '<span class="badge-doc">📎 '+item.dokumentasi+'</span>' : '-'}</td>
                        <td>
                            <button class="btn btn-outline btn-sm" onclick="editRow(${item.id})">✏ Edit</button>
                            <button class="btn-danger-sm" onclick="deleteRow(${item.id})">🗑</button>
                        </td>
                    </tr>
                `;
            }
        });

        tbody.innerHTML = html;
        document.getElementById('totalRow').textContent = `Total entri: ${filteredData.length}`;
    }

    // ========== CRUD ==========
    function tambahBaris() {
        const today = new Date().toISOString().split('T')[0];
        const now = new Date();
        const jam = String(now.getHours()).padStart(2,'0') + ':' + String(now.getMinutes()).padStart(2,'0');
        const newItem = {
            id: nextId++,
            tanggal: today,
            jam: jam + ' - ' + jam,
            kegiatan: '',
            dokumentasi: '-'
        };
        data.push(newItem);
        editingId = newItem.id;
        applyFilter(); // refresh filter & pagination
        // Cari halaman di mana data baru berada
        const idx = filteredData.findIndex(d => d.id === newItem.id);
        if (idx !== -1) {
            currentPage = Math.floor(idx / PER_PAGE) + 1;
        }
        renderTable();
        renderPagination();
        saveToLocal();
        showToast('Baris baru ditambahkan, silakan isi data.');
        setTimeout(() => {
            const el = document.getElementById('edit_kegiatan_' + newItem.id);
            if (el) el.focus();
        }, 150);
    }

    function editRow(id) {
        editingId = id;
        renderTable();
    }

    function saveEdit(id) {
        const tanggal = document.getElementById('edit_tanggal_'+id).value;
        const jam = document.getElementById('edit_jam_'+id).value;
        const kegiatan = document.getElementById('edit_kegiatan_'+id).value;
        const dokumentasi = document.getElementById('edit_dokumentasi_'+id).value || '-';

        const index = data.findIndex(d => d.id === id);
        if (index !== -1) {
            data[index] = { ...data[index], tanggal, jam, kegiatan, dokumentasi };
        }
        editingId = null;
        applyFilter();
        renderTable();
        renderPagination();
        saveToLocal();
        showToast('Data berhasil disimpan ✅');
    }

    function cancelEdit() {
        editingId = null;
        renderTable();
    }

    function deleteRow(id) {
        if (!confirm('Yakin ingin menghapus data ini?')) return;
        data = data.filter(d => d.id !== id);
        if (editingId === id) editingId = null;
        applyFilter();
        renderTable();
        renderPagination();
        saveToLocal();
        showToast('Data dihapus.');
    }

    // ========== VOICE TO TEXT ==========
    let recognition = null;
    let isListening = false;

    function toggleVoice() {
        const btn = document.getElementById('voiceBtn');
        
        if (!('webkitSpeechRecognition' in window) && !('SpeechRecognition' in window)) {
            showToast('❌ Browser tidak mendukung Voice to Text. Gunakan Chrome atau Edge.');
            return;
        }

        if (isListening) {
            stopVoice(btn);
            return;
        }

        let targetId = editingId;
        if (!targetId) {
            const emptyRow = data.find(d => d.kegiatan === '');
            if (emptyRow) {
                targetId = emptyRow.id;
                editingId = targetId;
                renderTable();
            } else {
                tambahBaris();
                const last = data[data.length - 1];
                targetId = last.id;
                editingId = targetId;
                renderTable();
            }
        }

        setTimeout(() => {
            const el = document.getElementById('edit_kegiatan_' + targetId);
            if (el) el.focus();
        }, 200);

        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        recognition = new SpeechRecognition();
        recognition.lang = 'id-ID';
        recognition.continuous = false;
        recognition.interimResults = false;

        recognition.onstart = function() {
            isListening = true;
            btn.classList.add('listening');
            btn.innerHTML = '🔴 Berhenti';
            showToast('🎤 Mendengarkan... Bicarakan catatan Anda.');
        };

        recognition.onresult = function(event) {
            const transcript = event.results[0][0].transcript;
            const el = document.getElementById('edit_kegiatan_' + targetId);
            if (el) {
                const current = el.value;
                el.value = current ? current + ' ' + transcript : transcript;
                el.dispatchEvent(new Event('input'));
            }
            showToast('✅ Voice diterima: "' + transcript.substring(0, 50) + (transcript.length > 50 ? '...' : '') + '"');
        };

        recognition.onerror = function(event) {
            if (event.error === 'not-allowed') {
                showToast('❌ Ijin mikrofon ditolak.');
            } else {
                showToast('❌ Error: ' + event.error);
            }
            stopVoice(btn);
        };

        recognition.onend = function() {
            stopVoice(btn);
        };

        try {
            recognition.start();
        } catch(e) {
            showToast('❌ Gagal memulai voice: ' + e.message);
            stopVoice(btn);
        }
    }

    function stopVoice(btn) {
        isListening = false;
        if (recognition) {
            try { recognition.stop(); } catch(e) {}
        }
        btn.classList.remove('listening');
        btn.innerHTML = '🎤 Voice to Text';
    }

    // ========== EXPORT EXCEL ==========
    function exportExcel() {
        const exportData = filteredData.length > 0 ? filteredData : data;
        if (exportData.length === 0) {
            showToast('⚠ Tidak ada data untuk diekspor.');
            return;
        }

        let csv = '\uFEFF';
        csv += 'Tanggal,Jam,Uraian Kegiatan,Dokumentasi\n';
        exportData.forEach(d => {
            const kegiatan = d.kegiatan.replace(/,/g, ';').replace(/\n/g, ' ');
            const dok = (d.dokumentasi || '-').replace(/,/g, ';');
            csv += `${d.tanggal},${d.jam},"${kegiatan}",${dok}\n`;
        });

        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.setAttribute('download', `Jurnal_Harian_${new Date().toISOString().split('T')[0]}.csv`);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(link.href);
        showToast('✅ Ekspor Excel berhasil!');
    }

    // ========== TOAST ==========
    function showToast(msg) {
        const toast = document.getElementById('toast');
        toast.textContent = msg;
        toast.classList.add('show');
        clearTimeout(toast._timer);
        toast._timer = setTimeout(() => {
            toast.classList.remove('show');
        }, 2500);
    }

    // ========== KEYBOARD SHORTCUT ==========
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.shiftKey && (e.key === 'v' || e.key === 'V')) {
            e.preventDefault();
            toggleVoice();
        }
        if (e.ctrlKey && e.shiftKey && (e.key === 'n' || e.key === 'N')) {
            e.preventDefault();
            tambahBaris();
        }
    });

    // ========== START ==========
    init();
</script>

</body>
</html>
