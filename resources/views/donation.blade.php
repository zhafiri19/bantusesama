<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bantu Sesama — Donasi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial
        }

        .preset-amount.active {
            background: #F53003;
            color: #fff;
            border-color: #F53003;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-white via-[#fff7f6] to-[#fff2f2] text-[#1b1b18]">
    <!-- Header -->
    <header class="max-w-6xl mx-auto px-6 py-6 flex items-center justify-between">
        <a href="" class="flex items-center gap-3">
            <div class="w-10 h-10 bg-[#F53003] rounded-full flex items-center justify-center text-white font-bold">BS
            </div>
            <div class="font-semibold text-lg">Bantu Sesama</div>
        </a>
        <nav class="flex items-center gap-4 text-sm">
            <a href="#campaigns" class="hover:underline">Kampanye</a>
            <a href="#donate" class="hover:underline">Donasi</a>
            <a href="#about" class="hover:underline">Tentang</a>
        </nav>
    </header>

    <!-- Hero -->
    <section class="max-w-6xl mx-auto px-6 py-10 lg:py-20 flex flex-col lg:flex-row items-center gap-10">
        <div class="flex-1">
            <h1 class="text-3xl lg:text-4xl font-extrabold mb-3">Bantu Sesama — Satu langkah kecil, berdampak besar</h1>
            <p class="text-gray-600 mb-6">Di luar sana, masih banyak saudara kita yang berjuang untuk memenuhi kebutuhan
                dasar hidup makan, pendidikan, kesehatan, dan tempat tinggal.</p>
            <p class="text-gray-600 mb-6">
                Melalui Bantu Sesama, kamu bisa menjadi bagian dari perubahan itu.
                Satu donasi kecil darimu bisa menjadi harapan besar bagi mereka yang membutuhkan.</p>


            <div class="flex gap-3 flex-wrap">
                <a href="#campaigns" class="px-5 py-3 rounded-md bg-[#F53003] text-white font-medium">Jelajahi
                    Kampanye</a>
                <a href="#donate" class="px-5 py-3 rounded-md border border-[#1b1b18]">Donasi Sekarang</a>
            </div>
        </div>

        <!-- Donation form (static template) -->
        <aside class="w-full lg:w-96 p-6 bg-white rounded-lg shadow-md">
            <h3 class="font-semibold text-lg mb-3">Donasi Cepat</h3>
            <form action="#" id="donation_form">
                <label class="block text-sm mb-1">Pilih Jenis Donasi</label>
                <select name="donation_type" id="donation_type" class="w-full border rounded-md p-2 mb-3">
                    <option value="" disabled selected>Pilih jenis donasi</option>
                    <option value="bantuan_bencana">Bantuan Bencana</option>
                    <option value="beasiswa_anak">Beasiswa Anak</option>
                    <option value="bantuan_kesehatan">Bantuan Kesehatan</option>
                    <option value="bantuan_sosial">Bantuan Sosial</option>
                    <option value="bantuan_infrastruktur">Bantuan Infrastruktur</option>
                </select>

                <label class="block text-sm mb-1">Jumlah Donasi (Rp)</label>
                <div class="flex gap-2 mb-3">
                    <button type="button" class="flex-1 rounded-md border p-2 text-sm preset-amount"
                        data-value="25.000">25.000</button>
                    <button type="button" class="flex-1 rounded-md border p-2 text-sm preset-amount"
                        data-value="50.000">50.000</button>
                    <button type="button" class="flex-1 rounded-md border p-2 text-sm preset-amount"
                        data-value="100.000">100.000</button>
                </div>

                <input type="text" name="amount" id="amount" placeholder="Masukkan jumlah (mis. 10.000)"
                    class="w-full border rounded-md p-2 mb-3" value="" />

                <label class="block text-sm mb-1">Data Donatur</label>
                <input type="text" name="donor_name" id="donor_name" placeholder="Nama"
                    class="w-full border rounded-md p-2 mb-2" />
                <input type="email" id="donor_email" name="donor_email" placeholder="Email (opsional)"
                    class="w-full border rounded-md p-2 mb-3" />
                <textarea id="note" name="note" cols="30" rows="3" placeholder="Berikan Catatan (opsional)"
                    class="w-full border rounded-md p-2 mb-3"></textarea>

                <button type="submit" class="w-full bg-[#F53003] text-white rounded-md py-2 font-medium">Donasi
                    Sekarang</button>
            </form>
        </aside>
    </section>

    <!-- Mengapa Berdonasi Section -->
    <section class="bg-white py-16 px-6">
        <div class="max-w-6xl mx-auto">

            <!-- Heading -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                    Mengapa Berdonasi di <span class="text-emerald-600">Bantu Sesama</span>?
                </h2>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                    Kami berkomitmen menghadirkan platform donasi yang aman, transparan,
                    dan benar-benar berdampak bagi mereka yang membutuhkan.
                </p>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Card 1 -->
                <div class="p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div class="text-4xl mb-4">🤝</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">
                        Aman & Transparan
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Setiap donasi dikelola dengan penuh tanggung jawab dan
                        dilaporkan secara terbuka kepada para donatur.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div class="text-4xl mb-4">🎯</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">
                        Tepat Sasaran
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Bantuan disalurkan langsung kepada mereka yang
                        benar-benar membutuhkan tanpa perantara yang berlebihan.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div class="text-4xl mb-4">❤️</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">
                        Mudah & Cepat
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Proses donasi dibuat sederhana agar bisa dilakukan
                        kapan saja dan di mana saja.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials & Footer -->
    <section class="max-w-6xl mx-auto px-6 py-12">
        <h2 class="text-2xl font-semibold mb-4">Cerita Donasi</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-5 rounded-lg shadow-sm">
                <p class="text-sm text-gray-600">"Donasi melalui Bantu Sesama cepat dan transparan — saya melihat
                    update penggunaan donasi"</p>
                <div class="mt-3 font-medium">— Rafi</div>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm">
                <p class="text-sm text-gray-600">"Tim verifikasi responsif, kampanye terbukti membantu keluarga
                    terdampak"</p>
                <div class="mt-3 font-medium">— Sari</div>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm">
                <p class="text-sm text-gray-600">"Mudah memilih jumlah dan metode pembayaran. Recommended!"</p>
                <div class="mt-3 font-medium">— Ahmad</div>
            </div>
        </div>

        <footer class="mt-8 border-t pt-6 text-sm text-gray-600 flex items-center justify-between">
            <div>© 2025 Bantu Sesama — All rights reserved.</div>
            <div class="flex items-center gap-4">
                <a href="#">Tentang</a>
                <a href="#">Kontak</a>
                <a href="#">Kebijakan Privasi</a>
            </div>
        </footer>
    </section>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script
        src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}"
        data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    <script>
        // format input with dots as thousand separators (Rupiah)
        function formatWithDots(str) {
            var digits = String(str || '').replace(/[^0-9]/g, '');
            if (!digits) return '';
            return digits.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        var $amount = $('#amount');
        // initialize display (in case raw value exists)
        if ($amount.length) {
            $amount.val(formatWithDots($amount.val()));
        }

        // preset amount buttons
        $(document).on('click', '.preset-amount', function() {
            $('.preset-amount').removeClass('active');
            $(this).addClass('active');
            var val = $(this).data('value') || $(this).text();
            $amount.val(formatWithDots(val));
            $amount.trigger('input');
        });

        $amount.on('input', function() {
            var caret = this.selectionStart;
            var prevLen = this.value.length;
            this.value = formatWithDots(this.value);
            var newLen = this.value.length;
            this.selectionStart = this.selectionEnd = Math.max(0, caret + (newLen - prevLen));
        });

        $("#donation_form").submit(function(event) {
            event.preventDefault();

            // basic client-side validation
            var donorName = $('input#donor_name').val().trim();
            var donationType = $('select#donation_type').val();
            var rawAmount = $('#amount').val().replace(/\./g, '') || '0';

            if (!donorName) {
                alert('Mohon masukkan nama Anda.');
                $('input#donor_name').focus();
                return;
            }
            if (!donationType) {
                alert('Silakan pilih jenis donasi.');
                $('#donation_type').focus();
                return;
            }
            if (parseInt(rawAmount, 10) <= 0) {
                alert('Masukkan jumlah donasi yang valid.');
                $('#amount').focus();
                return;
            }

            $.post("/donation", {
                    _method: 'POST',
                    _token: '{{ csrf_token() }}',
                    donor_name: donorName,
                    donor_email: $('input#donor_email').val(),
                    donation_type: donationType,
                    amount: rawAmount,
                    note: $('textarea#note').val(),
                },
                function(data, status) {
                    console.log(data);
                    snap.pay(data.snap_token, {
                        // Optional
                        onSuccess: function(result) {
                            location.reload();
                        },
                        // Optional
                        onPending: function(result) {
                            location.reload();
                        },
                        // Optional
                        onError: function(result) {
                            location.reload();
                        }
                    });
                    return false;
                });
        })
    </script>
</body>

</html>
