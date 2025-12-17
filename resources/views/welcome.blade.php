<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Admin Dashboard') }}</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');

        :root {
            --bg: linear-gradient(180deg, #f3f6ff 0%, #f7f9fc 100%);
            --card: #ffffff;
            --muted: #6b7280;
            --accent: #0f172a;
            --accent-2: #0ea5a4;
            --success: #16a34a;
            --danger: #ef4444;
            --glass: rgba(255, 255, 255, 0.7)
        }

        * {
            box-sizing: border-box
        }

        body {
            font-family: 'Inter', system-ui, Arial, sans-serif;
            background: var(--bg);
            color: #0b1220;
            margin: 0;
            padding: 28px
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px
        }

        h1 {
            font-size: 20px;
            margin: 0;
            letter-spacing: -0.2px
        }

        .small {
            font-size: 13px;
            color: var(--muted)
        }

        .btn {
            background: linear-gradient(90deg, var(--accent), #243b5a);
            color: #fff;
            padding: 9px 14px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.08);
            transition: transform .12s ease, box-shadow .12s ease
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.12)
        }

        .wrap {
            max-width: 1120px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 20px;
            align-items: start
        }

        @media (max-width:980px) {
            .wrap {
                grid-template-columns: 1fr
            }
        }

        .card {
            background: var(--card);
            border-radius: 12px;
            padding: 18px;
            box-shadow: 0 8px 30px rgba(13, 38, 59, 0.06);
            border: 1px solid rgba(15, 23, 42, 0.04)
        }

        .search {
            width: 100%;
            padding: 10px 12px;
            border-radius: 10px;
            border: 1px solid rgba(11, 17, 32, 0.06);
            box-shadow: inset 0 1px 2px rgba(16, 24, 40, 0.02);
            font-size: 14px
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            background: transparent;
            border-radius: 8px;
            overflow: hidden
        }

        thead th {
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
            color: #fff;
            padding: 12px 14px;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            position: sticky;
            top: 0
        }

        tbody tr {
            transition: background .12s ease, transform .12s ease
        }

        tbody tr:hover {
            background: linear-gradient(90deg, #f1f6ff, #ffffff)
        }

        tbody td {
            padding: 12px 14px;
            border-bottom: 1px solid rgba(15, 23, 42, 0.04);
            vertical-align: middle
        }

        tbody tr:nth-child(even) td {
            background: rgba(15, 23, 42, 0.01)
        }

        .muted {
            color: var(--muted);
            font-size: 13px
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
            color: #fff;
            box-shadow: 0 4px 12px rgba(2, 6, 23, 0.06)
        }

        .badge.success {
            background: var(--success)
        }

        .badge.pending {
            background: #f59e0b
        }

        .badge.danger {
            background: var(--danger)
        }

        .actions a {
            margin-right: 6px;
            text-decoration: none;
            font-size: 13px;
            color: var(--accent-2);
            font-weight: 600
        }

        .actions a:hover {
            text-decoration: underline
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px
        }

        .metrics-grid {
            max-width: 1120px;
            margin: 0 auto 18px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        .stat {
            background: linear-gradient(180deg, #ffffff, #fbfdff);
            padding: 12px;
            border-radius: 10px;
            border: 1px solid rgba(15, 23, 42, 0.03);
            text-align: center
        }

        .stat .label {
            font-size: 12px;
            color: var(--muted)
        }

        .stat .value {
            font-weight: 700;
            font-size: 18px;
            margin-top: 6px
        }

        .pagination {
            margin-top: 14px;
            display: flex;
            gap: 8px;
            align-items: center
        }

        .no-data {
            text-align: center;
            padding: 28px 12px;
            color: var(--muted)
        }
    </style>
</head>

<body>
    <header>
        <div>
            <h1>Dashboard Donasi</h1>
            <div class="small">Kelola data donatur dan transaksi</div>
        </div>
        <div>
            <a class="btn" href="{{ url('/donation') }}">Buat Donasi</a>
        </div>
    </header>

    <div class="metrics-grid">
        <div class="card stat metric">
            <div class="small">Total Donasi</div>
            <div class="value">{{ \App\Models\Donation::count() }}</div>
        </div>
        <div class="card stat metric">
            <div class="small">Total Nilai (Rp)</div>
            <div class="value">Rp {{ number_format(\App\Models\Donation::sum('amount'), 0, ',', '.') }}</div>
        </div>
        <div class="card stat metric">
            <div class="small">Pending</div>
            <div class="value">{{ \App\Models\Donation::where('status', 'pending')->count() }}</div>
        </div>
        <div class="card stat metric">
            <div class="small">Selesai</div>
            <div class="value">{{ \App\Models\Donation::where('status', 'success')->count() }}</div>
        </div>
    </div>

    <div class="wrap">
        <main class="card">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                <div class="small">Daftar donasi</div>
                <div style="width:420px;max-width:55%;display:flex;gap:8px;align-items:center;justify-content:flex-end">
                    <select id="donation_status_filter" class="search" style="width:140px">
                        <option value="all">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="success">Selesai</option>
                        <option value="failed">Gagal</option>
                    </select>
                    <input id="donation_search" class="search" placeholder="Cari kode, nama, email, jumlah..." />
                    <button id="export_csv" class="btn" style="padding:8px 10px;font-size:13px">Export CSV</button>
                </div>
            </div>

            @if (isset($donations) && $donations->count())
                <div style="overflow:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th style="width:40px">No</th>
                                <th>Kode</th>
                                <th>Nama Donatur</th>
                                <th>Email</th>
                                <th style="width:120px">Jumlah</th>
                                <th>Tipe Donasi</th>
                                <th style="width:110px">Status</th>
                                <th style="width:80px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donations as $donation)
                                <tr data-status="{{ $donation->status ?? 'pending' }}">
                                    <td>{{ $loop->iteration + ($donations->currentPage() - 1) * $donations->perPage() }}
                                    </td>
                                    <td><strong>{{ $donation->donation_code }}</strong></td>
                                    <td>{{ $donation->donor_name ?? '-' }}</td>
                                    <td class="muted">{{ $donation->donor_email }}</td>
                                    <td>Rp {{ number_format($donation->amount ?? 0, 0, ',', '.') }}</td>
                                    <td class="muted">
                                        {{ ucwords(str_replace('_', ' ', $donation->donation_type ?? '-')) }}</td>
                                    <td>
                                        @if (($donation->status ?? 'pending') == 'success')
                                            <span class="badge success">Selesai</span>
                                        @elseif(($donation->status ?? '') == 'failed')
                                            <span class="badge danger">Gagal</span>
                                        @else
                                            <span class="badge pending">Pending</span>
                                        @endif
                                    </td>
                                    <td style="text-align:center">
                                        @if ($donation->status == 'pending')
                                            <span class="badge success" style="cursor:pointer"
                                                onclick="snap.pay('{{ $donation->snap_token }}')">Complete
                                                Payment</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination">
                    {{ $donations->links() }}
                </div>
            @else
                <div class="muted">Belum ada donasi. <a href="{{ url('/donation') }}">Buat yang pertama</a></div>
            @endif
        </main>

        <aside class="card">
            <h3 style="margin:0 0 8px 0">Overview</h3>
            <div class="stats-grid">
                <div>
                    <div class="small">Total</div>
                    <div style="font-weight:600">{{ \App\Models\Donation::count() }}</div>
                </div>
                <div>
                    <div class="small">Nilai (Rp)</div>
                    <div style="font-weight:600">Rp
                        {{ number_format(\App\Models\Donation::sum('amount'), 0, ',', '.') }}
                    </div>
                </div>
                <div>
                    <div class="small">Pending</div>
                    <div style="font-weight:600">{{ \App\Models\Donation::where('status', 'pending')->count() }}</div>
                </div>
                <div>
                    <div class="small">Selesai</div>
                    <div style="font-weight:600">{{ \App\Models\Donation::where('status', '!=', 'pending')->count() }}
                    </div>
                </div>
            </div>

            <div style="margin-top:14px">
                <h4 style="margin:6px 0 8px 0">Recent Donations</h4>
                <ul style="list-style:none;padding:0;margin:0">
                    @foreach (\App\Models\Donation::latest()->take(5)->get() as $recent)
                        <li
                            style="padding:8px 0;border-bottom:1px solid rgba(15,23,42,0.04);display:flex;justify-content:space-between;align-items:center">
                            <div style="font-size:13px">
                                <strong style="display:block">{{ $recent->donation_code }}</strong>
                                <span class="muted">{{ $recent->donor_name ?? $recent->donor_email }}</span>
                            </div>
                            <div style="text-align:right">
                                <div style="font-weight:600">Rp {{ number_format($recent->amount ?? 0, 0, ',', '.') }}
                                </div>
                                <div class="small muted">{{ $recent->created_at->format('Y-m-d') }}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div style="margin-top:12px" class="small">Last updated: {{ now()->format('Y-m-d H:i') }}</div>
        </aside>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}
    <script
        src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}"
        data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    <script>
        (function() {
            const search = document.getElementById('donation_search');
            const statusFilter = document.getElementById('donation_status_filter');
            const exportBtn = document.getElementById('export_csv');

            function applyFilters() {
                const q = (search && search.value || '').trim().toLowerCase();
                const status = (statusFilter && statusFilter.value) || 'all';
                document.querySelectorAll('table tbody tr').forEach(row => {
                    const matchesQuery = q === '' || row.textContent.toLowerCase().indexOf(q) !== -1;
                    const rowStatus = (row.dataset.status || 'pending').toLowerCase();
                    const matchesStatus = status === 'all' || rowStatus === status;
                    row.style.display = (matchesQuery && matchesStatus) ? '' : 'none';
                });
            }

            if (search) search.addEventListener('input', applyFilters);
            if (statusFilter) statusFilter.addEventListener('change', applyFilters);

            if (exportBtn) {
                exportBtn.addEventListener('click', function() {
                    const rows = Array.from(document.querySelectorAll('table tbody tr')).filter(r => r.style
                        .display !== 'none');
                    if (!rows.length) {
                        alert('Tidak ada baris untuk diekspor');
                        return;
                    }
                    const csv = [];
                    const headers = ['No', 'Kode', 'Nama', 'Email', 'Jumlah', 'Tipe', 'Status', 'Waktu'];
                    csv.push(headers.join(','));
                    rows.forEach(row => {
                        const cols = Array.from(row.querySelectorAll('td')).map(td => '"' + td
                            .textContent.replace(/"/g, '""').trim() + '"');
                        csv.push(cols.join(','));
                    });
                    const blob = new Blob([csv.join('\n')], {
                        type: 'text/csv;charset=utf-8;'
                    });
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'donations.csv';
                    document.body.appendChild(a);
                    a.click();
                    a.remove();
                    URL.revokeObjectURL(url);
                });
            }
        })();
    </script>

</body>

</html>
