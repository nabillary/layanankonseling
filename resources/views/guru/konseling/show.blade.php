<div class="form-container">
    <!-- Form Header -->
    <div class="form-header">
        <div class="header-icon">
            <i class="bi bi-lightbulb-fill"></i>
        </div>
        <div class="header-content">
            <h2 class="form-title">Solusi Konseling</h2>
            <p class="form-subtitle">Berikan solusi dan saran untuk mengatasi masalah siswa</p>
        </div>
    </div>

    <form action="/guru/konseling/{{ $konseling->id_konseling }}/solusi" method="POST" class="counseling-form">
        @csrf

        <!-- Information Card -->
        <div class="info-card">
            <div class="info-header">
                <i class="bi bi-info-circle-fill"></i>
                <span>Informasi Konseling</span>
            </div>

            <!-- NAMA SISWA -->
            <div class="form-group">
                <label class="form-label">
                    <i class="bi bi-person-circle"></i>
                    Nama Siswa
                </label>
                <div class="student-display">
                    <div class="student-avatar-large">
                        {{ substr($konseling->siswa->nama, 0, 1) }}
                    </div>
                    <div class="student-info-display">
                        <div class="student-name-large">{{ $konseling->siswa->nama }}</div>
                        <div class="student-meta-display">
                            <i class="bi bi-mortarboard"></i>
                            {{ $konseling->siswa->kelas ?? 'Tidak ada kelas' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- MASALAH -->
            <div class="form-group">
                <label class="form-label">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    Masalah yang Dihadapi
                </label>
                <div class="problem-display">
                    <div class="problem-icon-display">
                        <i class="bi bi-chat-square-text-fill"></i>
                    </div>
                    <div class="problem-text-display">
                        {{ $konseling->masalah }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Solution Card -->
        <div class="solution-card">
            <div class="solution-header">
                <div class="solution-header-content">
                    <i class="bi bi-lightbulb-fill"></i>
                    <span>Solusi dan Rekomendasi</span>
                </div>
                @if($konseling->solusi)
                <span class="status-badge-filled">
                    <i class="bi bi-check-circle-fill"></i>
                    Sudah diisi
                </span>
                @else
                <span class="status-badge-empty">
                    <i class="bi bi-clock-fill"></i>
                    Belum diisi
                </span>
                @endif
            </div>

            <!-- SOLUSI (EDITABLE) -->
            <div class="form-group">
                <label class="form-label-solution">
                    <i class="bi bi-pencil-square"></i>
                    Tuliskan Solusi Anda
                </label>
                <div class="textarea-wrapper">
                    <textarea 
                        name="solusi" 
                        class="form-control-modern" 
                        rows="8"
                        placeholder="Tuliskan solusi, saran, dan rekomendasi untuk mengatasi masalah siswa...&#10;&#10;Contoh:&#10;• Identifikasi akar masalah&#10;• Berikan pendekatan yang tepat&#10;• Saran tindak lanjut&#10;• Monitoring berkala"
                    >{{ $konseling->solusi }}</textarea>
                    <div class="textarea-footer">
                        <span class="char-count">
                            <i class="bi bi-textarea-t"></i>
                            <span id="charCount">{{ strlen($konseling->solusi ?? '') }}</span> karakter
                        </span>
                    </div>
                </div>

                @if(!$konseling->solusi)
                <div class="help-text">
                    <i class="bi bi-info-circle"></i>
                    <span>Solusi belum diisi. Berikan solusi yang konstruktif dan membantu siswa.</span>
                </div>
                @endif
            </div>

            <!-- Tips Section -->
            <div class="tips-section">
                <div class="tips-header">
                    <i class="bi bi-star-fill"></i>
                    Tips Memberikan Solusi
                </div>
                <ul class="tips-list">
                    <li><i class="bi bi-check2"></i> Bersikap empati dan memahami situasi siswa</li>
                    <li><i class="bi bi-check2"></i> Berikan solusi yang spesifik dan dapat diterapkan</li>
                    <li><i class="bi bi-check2"></i> Sertakan langkah-langkah konkret yang bisa diikuti</li>
                    <li><i class="bi bi-check2"></i> Tawarkan dukungan berkelanjutan jika diperlukan</li>
                </ul>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="form-actions">
            <a href="/guru/konseling/{{ $konseling->id_konseling }}" class="btn-cancel">
                <i class="bi bi-x-circle"></i>
                Batal
            </a>
            <button type="submit" class="btn-submit">
                <i class="bi bi-check-circle-fill"></i>
                Simpan Solusi
            </button>
        </div>
    </form>
</div>

<style>
/* Form Container */
.form-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 2rem 0;
}

/* Form Header */
.form-header {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    margin-bottom: 2rem;
    padding: 2rem;
    background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
    border-radius: 16px;
    color: white;
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
    flex-shrink: 0;
}

.header-content {
    flex: 1;
}

.form-title {
    font-size: 1.75rem;
    font-weight: 700;
    margin: 0;
    color: white;
}

.form-subtitle {
    font-size: 0.9375rem;
    margin: 0.5rem 0 0 0;
    color: rgba(255, 255, 255, 0.9);
}

/* Counseling Form */
.counseling-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

/* Info Card */
.info-card {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    border: 1px solid #e2e8f0;
}

.info-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding-bottom: 1.25rem;
    margin-bottom: 1.5rem;
    border-bottom: 2px solid #e2e8f0;
    font-size: 1.125rem;
    font-weight: 700;
    color: #1e293b;
}

.info-header i {
    color: #3b82f6;
    font-size: 1.25rem;
}

/* Form Group */
.form-group {
    margin-bottom: 1.5rem;
}

.form-group:last-child {
    margin-bottom: 0;
}

.form-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    font-size: 0.9375rem;
    color: #475569;
    margin-bottom: 0.75rem;
}

.form-label i {
    color: #3b82f6;
    font-size: 1.125rem;
}

/* Student Display */
.student-display {
    display: flex;
    align-items: center;
    gap: 1.25rem;
    padding: 1.25rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 12px;
    border: 2px solid #e2e8f0;
}

.student-avatar-large {
    width: 64px;
    height: 64px;
    border-radius: 12px;
    background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.75rem;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

.student-info-display {
    flex: 1;
}

.student-name-large {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 0.375rem;
}

.student-meta-display {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #64748b;
    font-size: 0.9375rem;
}

/* Problem Display */
.problem-display {
    display: flex;
    gap: 1rem;
    padding: 1.25rem;
    background: #fef3c7;
    border-radius: 12px;
    border: 2px solid #fde68a;
}

.problem-icon-display {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
    color: white;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.problem-text-display {
    flex: 1;
    color: #92400e;
    font-size: 0.9375rem;
    line-height: 1.6;
    font-weight: 500;
}

/* Solution Card */
.solution-card {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    border: 1px solid #e2e8f0;
}

.solution-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 1.25rem;
    margin-bottom: 1.5rem;
    border-bottom: 2px solid #e2e8f0;
}

.solution-header-content {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 1.125rem;
    font-weight: 700;
    color: #1e293b;
}

.solution-header-content i {
    color: #fbbf24;
    font-size: 1.25rem;
}

.status-badge-filled {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: #d1fae5;
    color: #065f46;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.8125rem;
}

.status-badge-empty {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: #fee2e2;
    color: #991b1b;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.8125rem;
}

.form-label-solution {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    font-size: 1rem;
    color: #1e293b;
    margin-bottom: 1rem;
}

.form-label-solution i {
    color: #3b82f6;
    font-size: 1.25rem;
}

/* Textarea Wrapper */
.textarea-wrapper {
    position: relative;
}

.form-control-modern {
    width: 100%;
    padding: 1.25rem;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    font-size: 0.9375rem;
    line-height: 1.6;
    color: #1e293b;
    background: #fafbfc;
    transition: all 0.3s ease;
    resize: vertical;
    font-family: inherit;
}

.form-control-modern:focus {
    outline: none;
    border-color: #3b82f6;
    background: white;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
}

.form-control-modern::placeholder {
    color: #94a3b8;
    line-height: 1.6;
}

.textarea-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 0.75rem;
}

.char-count {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #64748b;
    font-size: 0.875rem;
}

.char-count i {
    color: #94a3b8;
}

/* Help Text */
.help-text {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    margin-top: 0.75rem;
    padding: 0.875rem 1rem;
    background: #fef3c7;
    border-left: 4px solid #fbbf24;
    border-radius: 8px;
    font-size: 0.875rem;
    color: #92400e;
}

.help-text i {
    color: #f59e0b;
    margin-top: 0.125rem;
    flex-shrink: 0;
}

/* Tips Section */
.tips-section {
    margin-top: 1.5rem;
    padding: 1.25rem;
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    border-radius: 12px;
    border: 2px solid #93c5fd;
}

.tips-header {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 700;
    font-size: 0.9375rem;
    color: #1e40af;
    margin-bottom: 0.75rem;
}

.tips-header i {
    color: #fbbf24;
    font-size: 1.125rem;
}

.tips-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.tips-list li {
    display: flex;
    align-items: flex-start;
    gap: 0.625rem;
    color: #1e40af;
    font-size: 0.875rem;
    line-height: 1.5;
}

.tips-list li i {
    color: #10b981;
    margin-top: 0.125rem;
    flex-shrink: 0;
    font-size: 1rem;
    font-weight: 700;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
    padding-top: 1.5rem;
}

.btn-cancel {
    padding: 0.875rem 1.75rem;
    background: white;
    color: #64748b;
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.9375rem;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
}

.btn-cancel:hover {
    background: #f1f5f9;
    border-color: #cbd5e1;
    color: #475569;
}

.btn-submit {
    padding: 0.875rem 2rem;
    background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.9375rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4);
}

.btn-submit:active {
    transform: translateY(0);
}

/* Responsive Design */
@media (max-width: 768px) {
    .form-container {
        padding: 1rem;
    }

    .form-header {
        flex-direction: column;
        text-align: center;
        align-items: center;
    }

    .form-title {
        font-size: 1.5rem;
    }

    .info-card,
    .solution-card {
        padding: 1.5rem;
    }

    .student-display {
        flex-direction: column;
        text-align: center;
    }

    .solution-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.75rem;
    }

    .form-actions {
        flex-direction: column-reverse;
    }

    .btn-cancel,
    .btn-submit {
        width: 100%;
        justify-content: center;
    }

    .tips-section {
        padding: 1rem;
    }
}

@media (max-width: 480px) {
    .header-icon {
        width: 56px;
        height: 56px;
        font-size: 1.75rem;
    }

    .student-avatar-large {
        width: 56px;
        height: 56px;
        font-size: 1.5rem;
    }

    .problem-icon-display {
        width: 40px;
        height: 40px;
        font-size: 1.25rem;
    }
}
</style>

<script>
// Character counter for textarea
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.querySelector('.form-control-modern');
    const charCount = document.getElementById('charCount');
    
    if (textarea && charCount) {
        textarea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
    }
    
    // Auto-save draft (optional)
    let saveTimeout;
    textarea?.addEventListener('input', function() {
        clearTimeout(saveTimeout);
        saveTimeout = setTimeout(() => {
            // You can add auto-save functionality here
            console.log('Auto-saving draft...');
        }, 2000);
    });
});

// Confirm before leaving if form has changes
let formChanged = false;
const form = document.querySelector('.counseling-form');
const textarea = document.querySelector('.form-control-modern');

if (textarea) {
    const originalValue = textarea.value;
    
    textarea.addEventListener('input', function() {
        formChanged = this.value !== originalValue;
    });
    
    form?.addEventListener('submit', function() {
        formChanged = false;
    });
    
    window.addEventListener('beforeunload', function(e) {
        if (formChanged) {
            e.preventDefault();
            e.returnValue = '';
        }
    });
}
</script>