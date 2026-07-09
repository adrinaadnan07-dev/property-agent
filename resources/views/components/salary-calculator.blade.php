<div class="salary-calculator" id="salaryCalculator">
    <div class="calculator-form">
        <div class="form-section">
            <h4><i class="fas fa-home"></i> Maklumat Rumah</h4>
            <div class="form-group">
                <label for="housePrice">Harga Rumah (RM)</label>
                <div class="input-group">
                    <span class="input-prefix">RM</span>
                    <input type="number" id="housePrice" class="form-control" placeholder="300000" min="50000" step="10000" value="{{ $presetPrice ?? '300000' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="deposit">Jumlah Deposit (RM)</label>
                <div class="input-group">
                    <span class="input-prefix">RM</span>
                    <input type="number" id="deposit" class="form-control" placeholder="0" min="0" step="1000" value="0">
                </div>
            </div>
            <div class="form-group">
                <label for="margin">Margin Pembiayaan</label>
                <select id="margin" class="form-control">
                    <option value="90">90%</option>
                    <option value="95">95%</option>
                    <option value="100">100%</option>
                </select>
            </div>
        </div>

        <div class="form-section">
            <h4><i class="fas fa-user"></i> Maklumat Pemohon</h4>
            <div class="form-group">
                <label for="age">Umur</label>
                <input type="number" id="age" class="form-control" placeholder="30" min="18" max="70" value="30">
            </div>
            <div class="form-group">
                <label for="employment">Status Pekerjaan</label>
                <select id="employment" class="form-control">
                    <option value="government">Kerajaan</option>
                    <option value="private" selected>Swasta</option>
                    <option value="self-employed">Self-employed</option>
                    <option value="business">Business owner</option>
                </select>
            </div>
        </div>

        <div class="form-section">
            <h4><i class="fas fa-wallet"></i> Kewangan</h4>
            <div class="form-group">
                <label for="grossSalary">Gaji Kasar (RM)</label>
                <div class="input-group">
                    <span class="input-prefix">RM</span>
                    <input type="number" id="grossSalary" class="form-control" placeholder="5000" min="500" step="100" value="5000">
                </div>
            </div>
            <div class="form-group">
                <label for="netSalary">Gaji Bersih (RM)</label>
                <div class="input-group">
                    <span class="input-prefix">RM</span>
                    <input type="number" id="netSalary" class="form-control" placeholder="4500" min="0" step="100" value="4500">
                </div>
            </div>
            <div class="form-group">
                <label>Komitmen Bulanan</label>
                <div class="commitments">
                    <div class="commitment-row">
                        <span>Kereta</span>
                        <div class="input-group">
                            <span class="input-prefix">RM</span>
                            <input type="number" id="commitCar" class="form-control commitment-input" placeholder="0" min="0" step="50" value="0">
                        </div>
                    </div>
                    <div class="commitment-row">
                        <span>PTPTN</span>
                        <div class="input-group">
                            <span class="input-prefix">RM</span>
                            <input type="number" id="commitPtptn" class="form-control commitment-input" placeholder="0" min="0" step="50" value="0">
                        </div>
                    </div>
                    <div class="commitment-row">
                        <span>Personal Loan</span>
                        <div class="input-group">
                            <span class="input-prefix">RM</span>
                            <input type="number" id="commitPersonal" class="form-control commitment-input" placeholder="0" min="0" step="50" value="0">
                        </div>
                    </div>
                    <div class="commitment-row">
                        <span>Credit Card</span>
                        <div class="input-group">
                            <span class="input-prefix">RM</span>
                            <input type="number" id="commitCredit" class="form-control commitment-input" placeholder="0" min="0" step="50" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button id="checkEligibility" class="btn btn-primary btn-block">
            <i class="fas fa-calculator"></i> Semak Kelayakan
        </button>
    </div>

    <div class="calculator-result" id="calculatorResult" style="display: none;">
        <div class="result-header" id="resultHeader">
            <i class="fas fa-check-circle" id="resultIcon"></i>
            <h3 id="resultTitle">Anggaran Kelayakan Pembiayaan Anda</h3>
        </div>

        <div class="result-breakdown">
            <div class="breakdown-section">
                <h5>Pendapatan & Komitmen</h5>
                <div class="result-item">
                    <span class="result-label">Pendapatan Bersih</span>
                    <span class="result-value" id="resultNetSalary">RM 4,500</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Komitmen Sedia Ada</span>
                    <span class="result-value" id="resultCommitments">RM 0</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Ansuran Rumah Baru</span>
                    <span class="result-value" id="resultInstallment">RM 0</span>
                </div>
                <div class="result-item result-total">
                    <span class="result-label">Jumlah Komitmen</span>
                    <span class="result-value" id="resultTotalCommitment">RM 0</span>
                </div>
            </div>

            <div class="breakdown-section">
                <h5>Analisis Kelayakan</h5>
                <div class="result-item">
                    <span class="result-label">Harga Rumah</span>
                    <span class="result-value" id="resultPrice">RM 0</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Jumlah Pinjaman</span>
                    <span class="result-value" id="resultLoan">RM 0</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Tempoh Pembiayaan</span>
                    <span class="result-value" id="resultTenure">35 tahun</span>
                </div>
            </div>
        </div>

        <div class="dsr-meter">
            <div class="dsr-label">
                <span>DSR Anda</span>
                <span class="dsr-value" id="resultDsr">0%</span>
            </div>
            <div class="dsr-bar">
                <div class="dsr-fill" id="dsrFill" style="width: 0%"></div>
            </div>
            <div class="dsr-markers">
                <span class="marker safe">40%</span>
                <span class="marker warn">60%</span>
                <span class="marker danger">70%</span>
            </div>
        </div>

        <div class="status-card" id="statusCard">
            <div class="status-icon" id="statusIcon"><i class="fas fa-shield-alt"></i></div>
            <div class="status-text">
                <strong id="statusLabel">Sangat Berpotensi</strong>
                <p id="statusDesc">DSR anda berada di bawah had kebanyakan bank.</p>
            </div>
        </div>

        <div class="result-comparison" id="resultComparison" style="display: none;">
            <h5><i class="fas fa-chart-bar"></i> Perbandingan Harga Rumah</h5>
            <div class="comparison-table" id="comparisonTable"></div>
        </div>

        <div class="result-lead">
            <h5><i class="fas fa-phone-alt"></i> Nak Tahu Rumah Yang Sesuai Dengan Kemampuan Anda?</h5>
            <p>Isi borang di bawah, kami akan bantu cari rumah yang tepat untuk anda.</p>
            <form id="leadForm" class="lead-form">
                <div class="form-group">
                    <input type="text" id="leadName" class="form-control" placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <input type="tel" id="leadPhone" class="form-control" placeholder="No Telefon (WhatsApp)" required>
                </div>
                <div class="form-group">
                    <input type="number" id="leadBudget" class="form-control" placeholder="Budget Rumah (RM)">
                </div>
                <div class="form-group">
                    <input type="text" id="leadLocation" class="form-control" placeholder="Lokasi Pilihan">
                </div>
                <button type="submit" class="btn btn-whatsapp btn-block">
                    <i class="fab fa-whatsapp"></i> Hubungi Saya
                </button>
            </form>
        </div>

        <div class="result-disclaimer">
            <p><i class="fas fa-info-circle"></i> Keputusan ini adalah anggaran awal berdasarkan maklumat yang diberikan. Kelulusan sebenar tertakluk kepada penilaian pihak bank termasuk CCRIS, CTOS, pendapatan dan komitmen semasa.</p>
        </div>

        <div class="result-branding">
            <h5>Kenapa Guna {{ $agentCompany }}?</h5>
            <p style="text-align:center;color:var(--gray);font-size:0.85rem;margin-bottom:12px;">{{ $agentTagline }}</p>
            <div class="branding-items">
                <div class="branding-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Free loan eligibility check</span>
                </div>
                <div class="branding-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Bantuan dari booking hingga key handover</span>
                </div>
                <div class="branding-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Advice rumah pertama</span>
                </div>
                <div class="branding-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Negotiation dengan developer</span>
                </div>
            </div>
            <a href="https://wa.me/{{ $agentPhone }}" class="btn btn-outline-whatsapp btn-block" target="_blank">
                <i class="fab fa-whatsapp"></i> Saya Nak Tahu Lebih
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkBtn = document.getElementById('checkEligibility');
    const priceInput = document.getElementById('housePrice');
    const depositInput = document.getElementById('deposit');
    const marginInput = document.getElementById('margin');
    const ageInput = document.getElementById('age');
    const employmentInput = document.getElementById('employment');
    const grossSalaryInput = document.getElementById('grossSalary');
    const netSalaryInput = document.getElementById('netSalary');
    const commitCarInput = document.getElementById('commitCar');
    const commitPtptnInput = document.getElementById('commitPtptn');
    const commitPersonalInput = document.getElementById('commitPersonal');
    const commitCreditInput = document.getElementById('commitCredit');
    const resultDiv = document.getElementById('calculatorResult');

    if (!checkBtn) return;

    function calculate() {
        const price = parseFloat(priceInput.value) || 0;
        const deposit = parseFloat(depositInput.value) || 0;
        const margin = parseFloat(marginInput.value) || 90;
        const age = parseInt(ageInput.value) || 30;
        const grossSalary = parseFloat(grossSalaryInput.value) || 0;
        const netSalary = parseFloat(netSalaryInput.value) || 0;
        const commitCar = parseFloat(commitCarInput.value) || 0;
        const commitPtptn = parseFloat(commitPtptnInput.value) || 0;
        const commitPersonal = parseFloat(commitPersonalInput.value) || 0;
        const commitCredit = parseFloat(commitCreditInput.value) || 0;

        if (!grossSalary || grossSalary < 500) {
            alert('Sila masukkan gaji yang sah (minimum RM500)');
            return;
        }
        if (!price || price < 50000) {
            alert('Sila masukkan harga rumah yang sah (minimum RM50,000)');
            return;
        }

        const loanAmount = price * (margin / 100) - deposit;
        const annualRate = 0.04;
        const maxTenure = Math.min(35, 65 - age);
        const years = Math.max(5, maxTenure);
        const monthlyRate = annualRate / 12;
        const numPayments = years * 12;

        let monthlyInstallment = 0;
        if (loanAmount > 0 && numPayments > 0) {
            monthlyInstallment = loanAmount * (monthlyRate * Math.pow(1 + monthlyRate, numPayments)) / (Math.pow(1 + monthlyRate, numPayments) - 1);
        }

        const totalCommitments = commitCar + commitPtptn + commitPersonal + commitCredit;
        const totalCommitmentWithHouse = totalCommitments + monthlyInstallment;
        const salary = netSalary > 0 ? netSalary : grossSalary;
        const dsr = salary > 0 ? (totalCommitmentWithHouse / salary) * 100 : 0;

        const effectiveRate = employmentInput.value === 'government' ? 0.045 : 0.04;
        const monthlyRateEff = effectiveRate / 12;
        let monthlyInstallmentEff = 0;
        if (loanAmount > 0 && numPayments > 0) {
            monthlyInstallmentEff = loanAmount * (monthlyRateEff * Math.pow(1 + monthlyRateEff, numPayments)) / (Math.pow(1 + monthlyRateEff, numPayments) - 1);
        }

        const maxDsr = employmentInput.value === 'government' ? 80 : 70;
        const minSalary = 2000;
        const isApproved = dsr <= maxDsr && grossSalary >= minSalary;

        let confidenceLevel, confidenceColor, confidenceDesc;
        if (dsr < 40) {
            confidenceLevel = 'Sangat Berpotensi';
            confidenceColor = '#28a745';
            confidenceDesc = 'DSR anda berada di bawah had kebanyakan bank.';
        } else if (dsr <= 60) {
            confidenceLevel = 'Masih Boleh Dipertimbangkan';
            confidenceColor = '#ffc107';
            confidenceDesc = 'DSR anda dalam lingkungan yang masih boleh dipertimbangkan oleh bank.';
        } else {
            confidenceLevel = 'Perlu Semakan Lanjut';
            confidenceColor = '#dc3545';
            confidenceDesc = 'DSR anda melebihi had standard. Perbincangan lanjut dengan pegawai bank diperlukan.';
        }

        document.getElementById('resultNetSalary').textContent = 'RM ' + salary.toLocaleString('en-MY', { minimumFractionDigits: 0 });
        document.getElementById('resultCommitments').textContent = 'RM ' + totalCommitments.toLocaleString('en-MY', { minimumFractionDigits: 0 });
        document.getElementById('resultInstallment').textContent = 'RM ' + monthlyInstallmentEff.toLocaleString('en-MY', { minimumFractionDigits: 0 });
        document.getElementById('resultTotalCommitment').textContent = 'RM ' + (totalCommitments + monthlyInstallmentEff).toLocaleString('en-MY', { minimumFractionDigits: 0 });
        document.getElementById('resultPrice').textContent = 'RM ' + price.toLocaleString('en-MY', { minimumFractionDigits: 0 });
        document.getElementById('resultLoan').textContent = 'RM ' + Math.max(0, loanAmount).toLocaleString('en-MY', { minimumFractionDigits: 0 });
        document.getElementById('resultTenure').textContent = years + ' tahun';
        document.getElementById('resultDsr').textContent = dsr.toFixed(2) + '%';

        const dsrFill = document.getElementById('dsrFill');
        dsrFill.style.width = Math.min(dsr, 100) + '%';
        dsrFill.style.background = dsr < 40 ? '#28a745' : dsr <= 60 ? '#ffc107' : '#dc3545';

        const statusIcon = document.getElementById('statusIcon');
        const statusLabel = document.getElementById('statusLabel');
        const statusDesc = document.getElementById('statusDesc');
        statusIcon.innerHTML = dsr < 40 ? '<i class="fas fa-check-circle" style="color: #28a745; font-size: 2rem;"></i>' : dsr <= 60 ? '<i class="fas fa-exclamation-circle" style="color: #ffc107; font-size: 2rem;"></i>' : '<i class="fas fa-times-circle" style="color: #dc3545; font-size: 2rem;"></i>';
        statusLabel.textContent = confidenceLevel;
        statusLabel.style.color = confidenceColor;
        statusDesc.textContent = confidenceDesc;

        const resultHeader = document.getElementById('resultHeader');
        const resultIcon = document.getElementById('resultIcon');
        const resultTitle = document.getElementById('resultTitle');

        if (dsr < 40) {
            resultHeader.className = 'result-header result-approved';
            resultIcon.className = 'fas fa-check-circle';
            resultTitle.textContent = '✅ Anggaran Kelayakan Pembiayaan Anda';
        } else if (dsr <= 60) {
            resultHeader.className = 'result-header result-warning';
            resultIcon.className = 'fas fa-exclamation-circle';
            resultTitle.textContent = '⚠️ Semakan Lanjut Diperlukan';
        } else {
            resultHeader.className = 'result-header result-rejected';
            resultIcon.className = 'fas fa-times-circle';
            resultTitle.textContent = 'Perbincangan Dengan Bank Diperlukan';
        }

        // Comparison table
        const comparisonEl = document.getElementById('resultComparison');
        const comparisonTable = document.getElementById('comparisonTable');
        const comparisons = [250000, 300000, 350000, 400000, 500000];
        let tableHtml = '<table><thead><tr><th>Harga Rumah</th><th>Ansuran</th><th>DSR</th></tr></thead><tbody>';
        comparisons.forEach(function(cPrice) {
            if (cPrice === price) return;
            const cLoan = cPrice * (margin / 100) - deposit;
            let cInstallment = 0;
            if (cLoan > 0 && numPayments > 0) {
                cInstallment = cLoan * (monthlyRateEff * Math.pow(1 + monthlyRateEff, numPayments)) / (Math.pow(1 + monthlyRateEff, numPayments) - 1);
            }
            const cTotal = totalCommitments + cInstallment;
            const cDsr = salary > 0 ? (cTotal / salary) * 100 : 0;
            const cClass = cDsr < 40 ? 'safe' : cDsr <= 60 ? 'warn' : 'danger';
            tableHtml += '<tr class="' + cClass + '"><td>RM ' + cPrice.toLocaleString() + '</td><td>RM ' + Math.round(cInstallment).toLocaleString() + '</td><td>' + cDsr.toFixed(1) + '%</td></tr>';
        });
        tableHtml += '</tbody></table>';
        comparisonTable.innerHTML = tableHtml;
        comparisonEl.style.display = 'block';

        resultDiv.style.display = 'block';
        resultDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

        return {
            price: price,
            monthlyInstallment: monthlyInstallmentEff,
            totalCommitments: totalCommitments,
            salary: salary,
            dsr: dsr,
            isApproved: isApproved,
            confidenceLevel: confidenceLevel
        };
    }

    checkBtn.addEventListener('click', calculate);

    // Lead form submission
    document.getElementById('leadForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('leadName').value;
        const phone = document.getElementById('leadPhone').value;
        const budget = document.getElementById('leadBudget').value;
        const location = document.getElementById('leadLocation').value;

        if (!name || !phone) {
            alert('Sila masukkan nama dan nombor telefon');
            return;
        }

        const price = parseFloat(priceInput.value) || 0;
        const grossSalary = parseFloat(grossSalaryInput.value) || 0;
        const data = {
            name: name,
            phone: phone,
            budget: budget || price,
            location: location || 'Tiada',
            salary: grossSalary,
            type: 'calculator_lead'
        };

        fetch('/inquiry', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
            },
            body: JSON.stringify(data)
        })
        .then(function(res) { return res.json(); })
        .then(function(resp) {
            if (resp.whatsapp_url) {
                window.open(resp.whatsapp_url, '_blank');
            }
        })
        .catch(function() {
            // Fallback WhatsApp
            const waMsg = 'Hi! Saya ' + name + ' ingin konsultasi rumah.\n\nBudget: RM' + budget + '\nLokasi: ' + location + '\nGaji: RM' + grossSalary;
            window.open('https://wa.me/{{ $agentPhone }}?text=' + encodeURIComponent(waMsg), '_blank');
        });
    });

    // Enter key support
    [grossSalaryInput, netSalaryInput, priceInput].forEach(function(input) {
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') checkBtn.click();
        });
    });
});
</script>
@endpush
