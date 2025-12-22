@extends('layouts.guru')

@section('content')
<div class="page-container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-icon">
                <i class="bi bi-inbox-fill"></i>
            </div>
            <div>
                <h1 class="page-title">Konseling Masuk</h1>
                <p class="page-subtitle">Kelola pengajuan konseling dari siswa yang membutuhkan bantuan</p>
            </div>
        </div>
        <div class="header-stats">
            <div class="stat-item">
                <span class="stat-number">{{ $konseling->count() ?? 0 }}</span>
                <span class="stat-label">Total Masuk</span>
            </div>
        </div>
    </div>

    <!-- Filter & Search Section -->
    <div class="filter-section">
        <div class="search-box">
            <i class="bi bi-search"></i>
            <input type="text" id="searchInput" placeholder="Cari nama siswa atau jenis masalah..." />
        </div>
        <div class="filter-actions">
            <button class="btn-filter" onclick="filterByStatus('all')">
                <i class="bi bi-grid-3x3-gap"></i> Semua
            </button>
            <button class="btn-filter" onclick="filterByStatus('menunggu')">
                <i class="bi bi-clock-history"></i> Menunggu
            </button>
            <button class="btn-filter" onclick="filterByStatus('terjadwal')">
                <i class="bi bi-calendar-check"></i> Terjadwal
            </button>
        </div>
    </div>

    <!-- Table Card -->
    <div class="table-card">
        @if(isset($konseling) && $konseling->count() > 0)
        <div class="table-header">
            <h3 class="table-title">
                <i class="bi bi-list-ul me-2"></i>Daftar Pengajuan Konseling
            </h3>
            <div class="table-actions">
                <button class="btn-export">
                    <i class="bi bi-download"></i> Export
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table modern-table" id="konselingTable">
                <thead>
                    <tr>
                        <th>
                            <div class="th-content">
                                <i class="bi bi-person-circle me-2"></i>Nama Siswa
                            </div>
                        </th>
                        <th>
                            <div class="th-content">
                                <i class="bi bi-journal-text me-2"></i>Jenis Konseling
                            </div>
                        </th>
                        <th>
    <div class="th-content">
        <i class="bi bi-lightbulb"></i> Solusi
    </div>
</th>

                        <th>
                            <div class="th-content">
                                <i class="bi bi-flag me-2"></i>Status
                            </div>
                        </th>
                        <th style="width: 140px;">
                            <div class="th-content justify-content-center">
                                <i class="bi bi-gear me-2"></i>Aksi
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($konseling as $item)
                    <tr class="table-row-hover" data-status="{{ $item->status }}">
                        <td>
                            <div class="student-info">
                                <div class="student-avatar">
                                    {{ substr($item->siswa->nama ?? 'U', 0, 1) }}
                                </div>
                                <div class="student-details">
                                    <strong class="student-name">{{ $item->siswa->nama ?? '-' }}</strong>
                                    <small class="student-meta">
                                        <i class="bi bi-mortarboard"></i> {{ $item->siswa->kelas ?? 'Tidak ada kelas' }}
                                    </small>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="problem-info">
                                <div class="problem-badge">
                                    <i class="bi bi-chat-square-text"></i>
                                </div>
                                <span class="problem-text">{{ $item->masalah }}</span>
                            </div>
                        </td>
<td>
    @if($item->solusi)
        <span class="badge bg-success">Sudah diisi</span>
    @else
        <span class="badge bg-secondary">Belum ada solusi</span>
    @endif
</td>

                        <td>
                            <span class="status-badge status-{{ 
                                $item->status == 'menunggu' ? 'waiting' : 
                                ($item->status == 'terjadwal' ? 'scheduled' : 'pending')
                            }}">
                                <i class="bi bi-{{ 
                                    $item->status == 'menunggu' ? 'hourglass-split' : 
                                    ($item->status == 'terjadwal' ? 'calendar-check' : 'clock')
                                }}"></i>
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>

                        <td>
                       <div class="action-buttons">
    <a href="/guru/konseling/{{ $item->id_konseling }}"
       class="btn-detail">

        <i class="bi bi-pencil-square"></i>
        {{ $item->solusi ? 'Edit Solusi' : 'Isi Solusi' }}
    </a>
</div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Info -->
        <div class="table-footer">
            <p class="showing-info">
                Menampilkan <strong>{{ $konseling->count() }}</strong> pengajuan konseling
            </p>
        </div>
        @else
        <div class="empty-state">
            <div class="empty-illustration">
                <div class="empty-icon">
                    <i class="bi bi-inbox"></i>
                </div>
                <div class="empty-circle circle-1"></div>
                <div class="empty-circle circle-2"></div>
                <div class="empty-circle circle-3"></div>
            </div>
            <h5 class="empty-title">Belum Ada Pengajuan Konseling</h5>
            <p class="empty-text">Pengajuan konseling dari siswa akan muncul di sini. Saat ini belum ada siswa yang mengajukan konseling.</p>
            <div class="empty-actions">
                <a href="/guru/dashboard" class="btn-back">
                    <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
/* Page Container */
.page-container {
    padding: 2rem 0;
}

/* Page Header */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding: 2rem;
    background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
    border-radius: 16px;
    color: white;
    flex-wrap: wrap;
    gap: 1.5rem;
}

.header-content {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.header-icon {
    width: 64px;
    height: 64px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
}

.page-title {
    font-size: 2rem;
    font-weight: 700;
    margin: 0;
    color: white;
}

.page-subtitle {
    font-size: 0.9375rem;
    margin: 0.5rem 0 0 0;
    color: rgba(255, 255, 255, 0.9);
}

.header-stats {
    display: flex;
    gap: 2rem;
}

.stat-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1rem 2rem;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border-radius: 12px;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: white;
}

.stat-label {
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.9);
    margin-top: 0.25rem;
}

/* Filter Section */
.filter-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    gap: 1rem;
    flex-wrap: wrap;
}

.search-box {
    flex: 1;
    min-width: 300px;
    max-width: 500px;
    position: relative;
}

.search-box i {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 1.125rem;
}

.search-box input {
    width: 100%;
    padding: 0.875rem 1rem 0.875rem 3rem;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    font-size: 0.9375rem;
    transition: all 0.3s ease;
    background: white;
}

.search-box input:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
}

.filter-actions {
    display: flex;
    gap: 0.75rem;
}

.btn-filter {
    padding: 0.75rem 1.25rem;
    background: white;
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.875rem;
    color: #64748b;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-filter:hover,
.btn-filter.active {
    background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
    color: white;
    border-color: transparent;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

/* Table Card */
.table-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    border: 1px solid #e2e8f0;
    overflow: hidden;
}

.table-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-bottom: 2px solid #e2e8f0;
}

.table-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1e293b;
    margin: 0;
    display: flex;
    align-items: center;
}

.table-actions {
    display: flex;
    gap: 0.75rem;
}

.btn-export {
    padding: 0.625rem 1.25rem;
    background: white;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.875rem;
    color: #64748b;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-export:hover {
    background: #3b82f6;
    color: white;
    border-color: #3b82f6;
}

/* Table */
.table-responsive {
    overflow-x: auto;
}

.modern-table {
    width: 100%;
    margin: 0;
    border-collapse: separate;
    border-spacing: 0;
}

.modern-table thead th {
    padding: 1.25rem 2rem;
    font-weight: 600;
    font-size: 0.875rem;
    color: #475569;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-bottom: 2px solid #e2e8f0;
    background: #fafbfc;
}

.th-content {
    display: flex;
    align-items: center;
}

.modern-table tbody tr {
    border-bottom: 1px solid #f1f5f9;
    transition: all 0.2s ease;
}

.modern-table tbody tr:last-child {
    border-bottom: none;
}

.table-row-hover:hover {
    background: #f8fafc;
}

.modern-table tbody td {
    padding: 1.5rem 2rem;
    color: #334155;
    font-size: 0.9375rem;
    vertical-align: middle;
}

/* Student Info */
.student-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.student-avatar {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.25rem;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

.student-details {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.student-name {
    color: #1e293b;
    font-weight: 600;
    font-size: 0.9375rem;
}

.student-meta {
    color: #94a3b8;
    font-size: 0.8125rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

/* Problem Info */
.problem-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.problem-badge {
    width: 36px;
    height: 36px;
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    color: #2563eb;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.problem-text {
    line-height: 1.5;
    max-width: 400px;
}

/* Status Badge */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.8125rem;
    white-space: nowrap;
}

.status-waiting {
    background: #fef3c7;
    color: #92400e;
    border: 2px solid #fde68a;
}

.status-scheduled {
    background: #dbeafe;
    color: #1e40af;
    border: 2px solid #bfdbfe;
}

.status-pending {
    background: #f1f5f9;
    color: #475569;
    border: 2px solid #e2e8f0;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
    justify-content: center;
}

.btn-detail {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.625rem 1.25rem;
    background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
    color: white;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.875rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-detail:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
    color: white;
}

/* Table Footer */
.table-footer {
    padding: 1.25rem 2rem;
    background: #fafbfc;
    border-top: 1px solid #e2e8f0;
}

.showing-info {
    margin: 0;
    color: #64748b;
    font-size: 0.875rem;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 5rem 2rem;
    position: relative;
}

.empty-illustration {
    position: relative;
    margin-bottom: 2rem;
}

.empty-icon {
    width: 140px;
    height: 140px;
    margin: 0 auto;
    border-radius: 50%;
    background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 1;
}

.empty-icon i {
    font-size: 4rem;
    color: #94a3b8;
}

.empty-circle {
    position: absolute;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(6, 182, 212, 0.1) 100%);
}

.circle-1 {
    width: 200px;
    height: 200px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    animation: pulse 3s ease-in-out infinite;
}

.circle-2 {
    width: 160px;
    height: 160px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    animation: pulse 3s ease-in-out infinite 0.5s;
}

.circle-3 {
    width: 120px;
    height: 120px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    animation: pulse 3s ease-in-out infinite 1s;
}

@keyframes pulse {
    0%, 100% {
        opacity: 0.4;
        transform: translate(-50%, -50%) scale(1);
    }
    50% {
        opacity: 0.2;
        transform: translate(-50%, -50%) scale(1.1);
    }
}

.empty-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 0.75rem;
}

.empty-text {
    color: #64748b;
    font-size: 1rem;
    max-width: 500px;
    margin: 0 auto 2rem;
    line-height: 1.6;
}

.empty-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-back {
    padding: 0.875rem 1.75rem;
    background: white;
    color: #3b82f6;
    border: 2px solid #3b82f6;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.9375rem;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-back:hover {
    background: #3b82f6;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .header-content {
        width: 100%;
    }

    .header-stats {
        width: 100%;
        justify-content: space-around;
    }

    .page-title {
        font-size: 1.5rem;
    }

    .filter-section {
        flex-direction: column;
        align-items: stretch;
    }

    .search-box {
        max-width: 100%;
    }

    .filter-actions {
        overflow-x: auto;
        padding-bottom: 0.5rem;
    }

    .table-header {
        flex-direction: column;
        gap: 1rem;
        align-items: flex-start;
    }

    .modern-table thead th,
    .modern-table tbody td {
        padding: 1rem;
        font-size: 0.875rem;
    }

    .student-avatar {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }

    .action-buttons {
        flex-direction: column;
    }
}
</style>

<script>
// Search functionality
document.getElementById('searchInput')?.addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('#konselingTable tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});

// Filter functionality
function filterByStatus(status) {
    const rows = document.querySelectorAll('#konselingTable tbody tr');
    const buttons = document.querySelectorAll('.btn-filter');
    
    // Update active button
    buttons.forEach(btn => btn.classList.remove('active'));
    event.target.closest('.btn-filter').classList.add('active');
    
    rows.forEach(row => {
        if (status === 'all') {
            row.style.display = '';
        } else {
            const rowStatus = row.getAttribute('data-status');
            row.style.display = rowStatus === status ? '' : 'none';
        }
    });
}

// Set default active filter
document.querySelector('.btn-filter')?.classList.add('active');
</script>
@endsection