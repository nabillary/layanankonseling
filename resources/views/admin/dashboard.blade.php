@extends('admin.layout')

@section('content')
<h1 class="page-title">Dashboard Admin</h1>

<div class="row g-3">
    <div class="col-lg-4 col-md-6">
        <div class="stat-card primary">
            <div class="stat-icon">
                <i class="bi bi-people-fill"></i>
            </div>
            <h6>Total Siswa</h6>
            <h3>{{ $totalSiswa }}</h3>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="stat-card success">
            <div class="stat-icon">
                <i class="bi bi-person-badge-fill"></i>
            </div>
            <h6>Total Guru BK</h6>
            <h3>{{ $totalGuru }}</h3>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="stat-card warning">
            <div class="stat-icon">
                <i class="bi bi-chat-dots-fill"></i>
            </div>
            <h6>Total Konseling</h6>
            <h3>{{ $totalKonseling }}</h3>
        </div>
    </div>
</div>

<h2 class="section-title">Statistik Sistem</h2>

<div class="row g-3">
    <!-- Pie Chart Card -->
    <div class="col-lg-6">
        <div class="table-card">
            <div class="card-header-custom">
                <h5 class="mb-0">Distribusi Data</h5>
                <span class="badge bg-primary">Overview</span>
            </div>
            <div class="chart-container">
                <div class="pie-chart-wrapper">
                    <svg viewBox="0 0 200 200" class="pie-svg">
                        @php
                            $total = $totalSiswa + $totalGuru + $totalKonseling;
                            $siswaPercent = $total > 0 ? ($totalSiswa / $total) * 100 : 0;
                            $guruPercent = $total > 0 ? ($totalGuru / $total) * 100 : 0;
                            $konselingPercent = $total > 0 ? ($totalKonseling / $total) * 100 : 0;
                        @endphp
                        
                        <!-- Siswa Slice -->
                        <circle cx="100" cy="100" r="80" fill="none" 
                                stroke="#6ba5a7" stroke-width="60"
                                stroke-dasharray="{{ ($siswaPercent/100) * 502.65 }} 502.65"
                                transform="rotate(-90 100 100)"/>
                        
                        <!-- Guru Slice -->
                        <circle cx="100" cy="100" r="80" fill="none" 
                                stroke="#5cb85c" stroke-width="60"
                                stroke-dasharray="{{ ($guruPercent/100) * 502.65 }} 502.65"
                                stroke-dashoffset="{{ -($siswaPercent/100) * 502.65 }}"
                                transform="rotate(-90 100 100)"/>
                        
                        <!-- Konseling Slice -->
                        <circle cx="100" cy="100" r="80" fill="none" 
                                stroke="#f0ad4e" stroke-width="60"
                                stroke-dasharray="{{ ($konselingPercent/100) * 502.65 }} 502.65"
                                stroke-dashoffset="{{ -(($siswaPercent + $guruPercent)/100) * 502.65 }}"
                                transform="rotate(-90 100 100)"/>
                        
                        <!-- Center Circle -->
                        <circle cx="100" cy="100" r="50" fill="white"/>
                        <text x="100" y="95" text-anchor="middle" class="pie-label">Total</text>
                        <text x="100" y="115" text-anchor="middle" class="pie-value">{{ $total }}</text>
                    </svg>
                </div>
                <div class="chart-legend">
                    <div class="legend-item">
                        <span class="legend-dot" style="background: #6ba5a7;"></span>
                        <span class="legend-text">Siswa</span>
                        <strong>{{ $totalSiswa }} ({{ number_format($siswaPercent, 1) }}%)</strong>
                    </div>
                    <div class="legend-item">
                        <span class="legend-dot" style="background: #5cb85c;"></span>
                        <span class="legend-text">Guru BK</span>
                        <strong>{{ $totalGuru }} ({{ number_format($guruPercent, 1) }}%)</strong>
                    </div>
                    <div class="legend-item">
                        <span class="legend-dot" style="background: #f0ad4e;"></span>
                        <span class="legend-text">Konseling</span>
                        <strong>{{ $totalKonseling }} ({{ number_format($konselingPercent, 1) }}%)</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bar Chart Card -->
    <div class="col-lg-6">
        <div class="table-card">
            <div class="card-header-custom">
                <h5 class="mb-0">Perbandingan Data</h5>
                <span class="badge bg-success">Statistik</span>
            </div>
            <div class="chart-container">
                <div class="bar-chart">
                    @php
                        $maxValue = max($totalSiswa, $totalGuru, $totalKonseling);
                        $siswaHeight = $maxValue > 0 ? ($totalSiswa / $maxValue) * 100 : 0;
                        $guruHeight = $maxValue > 0 ? ($totalGuru / $maxValue) * 100 : 0;
                        $konselingHeight = $maxValue > 0 ? ($totalKonseling / $maxValue) * 100 : 0;
                    @endphp
                    
                    <div class="bar-item">
                        <div class="bar-wrapper">
                            <div class="bar-fill bar-primary" style="height: {!! $siswaHeight !!}%">
                                <span class="bar-value">{{ $totalSiswa }}</span>
                            </div>
                        </div>
                        <div class="bar-label">Siswa</div>
                    </div>
                    
                    <div class="bar-item">
                        <div class="bar-wrapper">
                            <div class="bar-fill bar-success" style="height: {!! $guruHeight !!}%">
                                <span class="bar-value">{{ $totalGuru }}</span>
                            </div>
                        </div>
                        <div class="bar-label">Guru BK</div>
                    </div>
                    
                    <div class="bar-item">
                        <div class="bar-wrapper">
                            <div class="bar-fill bar-warning" style="height: {!! $konselingHeight !!}%">
                                <span class="bar-value">{{ $totalKonseling }}</span>
                            </div>
                        </div>
                        <div class="bar-label">Konseling</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<h2 class="section-title">Informasi Sistem</h2>

<div class="row g-3">
    <div class="col-lg-4 col-md-6">
        <div class="info-card-custom primary">
            <i class="bi bi-shield-check"></i>
            <div>
                <h6>Sistem Aman</h6>
                <p>Keamanan terjaga dengan baik</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="info-card-custom success">
            <i class="bi bi-graph-up-arrow"></i>
            <div>
                <h6>Berjalan Optimal</h6>
                <p>Semua layanan beroperasi normal</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="info-card-custom warning">
            <i class="bi bi-clock-history"></i>
            <div>
                <h6>Update Realtime</h6>
                <p>Data ter-update secara otomatis</p>
            </div>
        </div>
    </div>
</div>

<style>
.page-title {
    font-size: 1.8rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 1.5rem;
}

.section-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: #2c3e50;
    margin: 2rem 0 1rem 0;
}

.row {
    margin-left: 0;
    margin-right: 0;
}

.stat-card {
    background: white;
    padding: 1.5rem;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: transform 0.2s;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.stat-card.primary {
    border-left: 4px solid #6ba5a7;
}

.stat-card.success {
    border-left: 4px solid #5cb85c;
}

.stat-card.warning {
    border-left: 4px solid #f0ad4e;
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
}

.stat-card.primary .stat-icon {
    background: rgba(107, 165, 167, 0.1);
    color: #6ba5a7;
}

.stat-card.success .stat-icon {
    background: rgba(92, 184, 92, 0.1);
    color: #5cb85c;
}

.stat-card.warning .stat-icon {
    background: rgba(240, 173, 78, 0.1);
    color: #f0ad4e;
}

.stat-card h6 {
    margin: 0;
    font-size: 0.9rem;
    color: #7f8c8d;
    font-weight: 500;
}

.stat-card h3 {
    margin: 0.3rem 0 0 0;
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
}

.table-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-bottom: 1rem;
}

.card-header-custom {
    padding: 1.25rem;
    border-bottom: 1px solid #ecf0f1;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header-custom h5 {
    color: #2c3e50;
    font-weight: 600;
}

.chart-container {
    padding: 2rem;
}

.pie-chart-wrapper {
    display: flex;
    justify-content: center;
    margin-bottom: 1.5rem;
}

.pie-svg {
    width: 200px;
    height: 200px;
}

.pie-label {
    font-size: 12px;
    fill: #7f8c8d;
    font-weight: 600;
}

.pie-value {
    font-size: 24px;
    fill: #2c3e50;
    font-weight: 700;
}

.chart-legend {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.legend-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem;
    background: #f8f9fa;
    border-radius: 6px;
}

.legend-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.legend-text {
    flex: 1;
    color: #7f8c8d;
    font-size: 0.9rem;
}

.legend-item strong {
    color: #2c3e50;
}

.bar-chart {
    display: flex;
    justify-content: space-around;
    align-items: flex-end;
    height: 250px;
    gap: 2rem;
    padding: 1rem;
}

.bar-item {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
}

.bar-wrapper {
    width: 100%;
    height: 200px;
    display: flex;
    align-items: flex-end;
}

.bar-fill {
    width: 100%;
    border-radius: 6px 6px 0 0;
    transition: height 1s ease;
    display: flex;
    justify-content: center;
    padding-top: 0.5rem;
}

.bar-primary {
    background: #6ba5a7;
}

.bar-success {
    background: #5cb85c;
}

.bar-warning {
    background: #f0ad4e;
}

.bar-value {
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
}

.bar-label {
    font-weight: 600;
    color: #2c3e50;
}

.info-card-custom {
    background: white;
    padding: 1.25rem;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    display: flex;
    align-items: center;
    gap: 1rem;
    border-left: 4px solid;
}

.info-card-custom.primary {
    border-color: #6ba5a7;
}

.info-card-custom.success {
    border-color: #5cb85c;
}

.info-card-custom.warning {
    border-color: #f0ad4e;
}

.info-card-custom i {
    font-size: 2rem;
}

.info-card-custom.primary i {
    color: #6ba5a7;
}

.info-card-custom.success i {
    color: #5cb85c;
}

.info-card-custom.warning i {
    color: #f0ad4e;
}

.info-card-custom h6 {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
    color: #2c3e50;
}

.info-card-custom p {
    margin: 0.25rem 0 0 0;
    font-size: 0.85rem;
    color: #7f8c8d;
}

@media (max-width: 768px) {
    .page-title {
        font-size: 1.5rem;
    }
    
    .stat-card h3 {
        font-size: 1.5rem;
    }
    
    .bar-chart {
        gap: 1rem;
    }
}
</style>
@endsection