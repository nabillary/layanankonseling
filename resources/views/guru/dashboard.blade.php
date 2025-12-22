@extends('layouts.guru')

@section('content')
<div class="dashboard-container">
    <!-- Header Section -->
    <div class="dashboard-header">
        <div>
            <h1 class="page-title mb-1">Dashboard Overview</h1>
            <p class="text-muted">Pantau aktivitas konseling siswa secara real-time</p>
        </div>
        <div class="header-actions">
            <span class="last-update">
                <i class="bi bi-clock"></i> Terakhir diperbarui: {{ date('d M Y, H:i') }}
            </span>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-lg-4 col-md-6">
            <div class="stat-card stat-warning">
                <div class="stat-card-body">
                    <div class="stat-content">
                        <div class="stat-info">
                            <p class="stat-label">Konseling Menunggu</p>
                            <h2 class="stat-value">{{ $menunggu }}</h2>
                            <span class="stat-badge badge-warning">Perlu Perhatian</span>
                        </div>
                        <div class="stat-icon-wrapper stat-icon-warning">
                            <i class="bi bi-hourglass-split"></i>
                        </div>
                    </div>
                    <div class="stat-footer">
                        <span class="stat-trend">
                            <i class="bi bi-arrow-up"></i> Prioritas tinggi
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="stat-card stat-primary">
                <div class="stat-card-body">
                    <div class="stat-content">
                        <div class="stat-info">
                            <p class="stat-label">Sedang Diproses</p>
                            <h2 class="stat-value">{{ $proses }}</h2>
                            <span class="stat-badge badge-primary">Dalam Proses</span>
                        </div>
                        <div class="stat-icon-wrapper stat-icon-primary">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                    </div>
                    <div class="stat-footer">
                        <span class="stat-trend">
                            <i class="bi bi-activity"></i> Sedang berlangsung
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="stat-card stat-success">
                <div class="stat-card-body">
                    <div class="stat-content">
                        <div class="stat-info">
                            <p class="stat-label">Selesai</p>
                            <h2 class="stat-value">{{ $selesai }}</h2>
                            <span class="stat-badge badge-success">Completed</span>
                        </div>
                        <div class="stat-icon-wrapper stat-icon-success">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                    </div>
                    <div class="stat-footer">
                        <span class="stat-trend">
                            <i class="bi bi-graph-up"></i> Total terselesaikan
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Counseling Table -->
    <div class="table-section">
        <div class="section-header">
            <div>
                <h2 class="section-title">Konseling Terbaru</h2>
                <p class="section-subtitle">Daftar konseling yang baru masuk dan memerlukan tindakan</p>
            </div>
            <a href="/guru/konseling" class="btn btn-outline-primary">
                Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="table-card">
            @if(count($latest) > 0)
            <div class="table-responsive">
                <table class="table modern-table">
                    <thead>
                        <tr>
                            <th>
                                <div class="th-content">
                                    <i class="bi bi-person-circle me-2"></i>Nama Siswa
                                </div>
                            </th>
                            <th>
                                <div class="th-content">
                                    <i class="bi bi-journal-text me-2"></i>Jenis Masalah
                                </div>
                            </th>
                            <th>
                                <div class="th-content">
                                    <i class="bi bi-flag me-2"></i>Status
                                </div>
                            </th>
                            <th class="text-center" style="width: 120px;">
                                <div class="th-content justify-content-center">
                                    <i class="bi bi-gear me-2"></i>Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latest as $item)
                        <tr class="table-row-hover">
                            <td>
                                <div class="student-info">
                                    <div class="student-avatar">
                                        {{ substr($item->siswa->nama ?? 'U', 0, 1) }}
                                    </div>
                                    <div class="student-details">
                                        <strong class="student-name">{{ $item->siswa->nama ?? '-' }}</strong>
                                        <small class="student-meta">{{ $item->siswa->kelas ?? '' }}</small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="problem-cell">
                                    <span class="problem-text">{{ $item->masalah }}</span>
                                </div>
                            </td>

                            <td>
                                <span class="status-badge status-{{ 
                                    $item->status == 'terjadwal' ? 'warning' :
                                    ($item->status == 'selesai' ? 'success' : 'secondary')
                                }}">
                                    <i class="bi bi-{{ 
                                        $item->status == 'terjadwal' ? 'clock' :
                                        ($item->status == 'selesai' ? 'check-circle' : 'circle')
                                    }}"></i>
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>

                            <td class="text-center">
                                <a href="/guru/konseling/{{ $item->id_konseling }}" class="btn-action-modern">
                                    <i class="bi bi-eye"></i>
                                    <span>Lihat</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="bi bi-inbox"></i>
                </div>
                <h5 class="empty-title">Belum Ada Data Konseling</h5>
                <p class="empty-text">Data konseling siswa akan muncul di sini ketika ada pengajuan baru</p>
                <a href="/guru/konseling/create" class="btn btn-primary mt-3">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Konseling
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
/* Dashboard Container */
.dashboard-container {
    padding: 2rem 0;
}

/* Header Section */
.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1rem;
}

.page-title {
    font-size: 1.875rem;
    font-weight: 700;
    color: #1a202c;
    margin: 0;
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.last-update {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: #f7fafc;
    border-radius: 8px;
    font-size: 0.875rem;
    color: #64748b;
}

/* Statistics Cards */
.stat-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
    height: 100%;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
}

.stat-card-body {
    padding: 1.5rem;
}

.stat-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
}

.stat-info {
    flex: 1;
}

.stat-label {
    font-size: 0.875rem;
    font-weight: 500;
    color: #64748b;
    margin-bottom: 0.5rem;
}

.stat-value {
    font-size: 2.5rem;
    font-weight: 700;
    margin: 0.5rem 0;
    line-height: 1;
}

.stat-badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
}

.badge-warning {
    background: #fef3c7;
    color: #92400e;
}

.badge-primary {
    background: #dbeafe;
    color: #1e40af;
}

.badge-success {
    background: #d1fae5;
    color: #065f46;
}

.stat-icon-wrapper {
    width: 64px;
    height: 64px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
}

.stat-icon-warning {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    color: #d97706;
}

.stat-icon-primary {
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    color: #2563eb;
}

.stat-icon-success {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    color: #059669;
}

.stat-footer {
    padding-top: 1rem;
    border-top: 1px solid #f1f5f9;
}

.stat-trend {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.8125rem;
    color: #64748b;
}

/* Color Variants */
.stat-warning .stat-value {
    color: #d97706;
}

.stat-primary .stat-value {
    color: #2563eb;
}

.stat-success .stat-value {
    color: #059669;
}

/* Table Section */
.table-section {
    margin-top: 2.5rem;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
    gap: 1rem;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1a202c;
    margin: 0;
}

.section-subtitle {
    color: #64748b;
    font-size: 0.875rem;
    margin: 0.25rem 0 0 0;
}

.btn-outline-primary {
    padding: 0.625rem 1.25rem;
    border: 2px solid #2563eb;
    color: #2563eb;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.875rem;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
}

.btn-outline-primary:hover {
    background: #2563eb;
    color: white;
    transform: translateX(4px);
}

/* Table Card */
.table-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    border: 1px solid #e2e8f0;
}

.table-responsive {
    overflow-x: auto;
}

.modern-table {
    width: 100%;
    margin: 0;
    border-collapse: separate;
    border-spacing: 0;
}

.modern-table thead {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.modern-table thead th {
    padding: 1.25rem 1.5rem;
    font-weight: 600;
    font-size: 0.875rem;
    color: #475569;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-bottom: 2px solid #e2e8f0;
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
    padding: 1.25rem 1.5rem;
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
    width: 42px;
    height: 42px;
    border-radius: 10px;
    background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.125rem;
    flex-shrink: 0;
}

.student-details {
    display: flex;
    flex-direction: column;
    gap: 0.125rem;
}

.student-name {
    color: #1e293b;
    font-weight: 600;
    font-size: 0.9375rem;
}

.student-meta {
    color: #94a3b8;
    font-size: 0.8125rem;
}

/* Problem Cell */
.problem-cell {
    max-width: 350px;
}

.problem-text {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    line-height: 1.5;
}

/* Status Badge */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.8125rem;
    white-space: nowrap;
}

.status-warning {
    background: #fef3c7;
    color: #92400e;
}

.status-success {
    background: #d1fae5;
    color: #065f46;
}

.status-secondary {
    background: #f1f5f9;
    color: #475569;
}

/* Action Button */
.btn-action-modern {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
    color: white;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.875rem;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
}

.btn-action-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
    color: white;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
}

.empty-icon {
    width: 120px;
    height: 120px;
    margin: 0 auto 1.5rem;
    border-radius: 50%;
    background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.empty-icon i {
    font-size: 3.5rem;
    color: #94a3b8;
}

.empty-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 0.5rem;
}

.empty-text {
    color: #64748b;
    font-size: 0.9375rem;
    max-width: 400px;
    margin: 0 auto;
}

.btn-primary {
    padding: 0.75rem 1.5rem;
    background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.9375rem;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
    color: white;
}

/* Responsive Design */
@media (max-width: 768px) {
    .dashboard-header {
        flex-direction: column;
    }

    .section-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .page-title {
        font-size: 1.5rem;
    }

    .stat-value {
        font-size: 2rem;
    }

    .stat-icon-wrapper {
        width: 52px;
        height: 52px;
        font-size: 1.5rem;
    }

    .modern-table thead th,
    .modern-table tbody td {
        padding: 1rem;
        font-size: 0.875rem;
    }

    .student-avatar {
        width: 36px;
        height: 36px;
        font-size: 1rem;
    }
}
</style>
@endsection