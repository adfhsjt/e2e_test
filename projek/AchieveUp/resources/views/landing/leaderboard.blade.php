<section id="leaderboard" class="section-padding-lg bg-white">
    <div class="container-main">
        <!-- Section Header -->
        <div class="text-center mb-16 animate-on-scroll">
            <p class="text-purple-600 text-sm lg:text-base font-medium mb-4">
                Peringkat Prestasi Mahasiswa
            </p>
            <h2 class="text-4xl lg:text-5xl font-bold mb-6">
                <span class="text-gradient">Peringkat</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Daftar mahasiswa dengan peringkat terbaik berdasarkan metode ELECTRE pada tahun akademik berjalan.
            </p>
        </div>

        @php
            // Pastikan $rankElectre ada dan adalah array, ambil 10 teratas
            $rankElectreList = is_array($rankElectre) ? array_slice($rankElectre, 0, 10) : [];
            // Siapkan data juara 1-3
            $podium = array_slice($rankElectreList, 0, 3);
            $others = array_slice($rankElectreList, 3, 7);
            // Helper untuk inisial avatar
            function avatar_initial($nama)
            {
                $arr = explode(' ', trim($nama ?? ''));
                $inisial =
                    count($arr) > 1
                        ? strtoupper(substr($arr[0], 0, 1) . substr(end($arr), 0, 1))
                        : strtoupper(substr($arr[0], 0, 2));
                return $inisial;
            }
        @endphp

        <!-- Podium 1,2,3 -->
        <div class="flex justify-center items-end gap-8 mb-12">
            @foreach ([1, 0, 2] as $i)
                {{-- Urutan tampilan: 2, 1, 3 --}}
                @if (isset($podium[$i]))
                    @php
                        $p = $podium[$i];
                        $rank = $i + 1;
                        $isChampion = $i === 0;
                        $avatar =
                            'https://ui-avatars.com/api/?name=' .
                            urlencode($p['nama']) .
                            '&background=' .
                            ($rank == 1 ? 'fbbf24' : ($rank == 2 ? 'e5e7eb' : 'cd7c2f')) .
                            '&color=' .
                            ($rank == 1 ? '92400e' : ($rank == 2 ? '374151' : 'ffffff')) .
                            '&size=' .
                            ($rank == 1 ? 96 : 80);
                    @endphp
                    <div class="flex flex-col items-center animate-on-scroll" style="animation-delay: 0.1s;">
                        <div class="relative mb-4">
                            <img src="{{ $avatar }}" alt="{{ $p['nama'] }}"
                                class="w-{{ $rank == 1 ? '24' : '20' }} h-{{ $rank == 1 ? '24' : '20' }} rounded-full border-4
                                    {{ $rank == 1 ? 'border-yellow-400 shadow-xl' : ($rank == 2 ? 'border-gray-300 shadow-lg' : 'border-orange-400 shadow-lg') }}">
                            <div
                                class="absolute -top-2 -right-2 w-8 h-8 {{ $rank == 1 ? 'bg-yellow-500' : ($rank == 2 ? 'bg-gray-400' : 'bg-orange-500') }} text-white rounded-full flex items-center justify-center font-bold text-sm">
                                {{ $rank }}
                            </div>
                            @if ($rank == 1)
                                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                    <svg class="w-8 h-8 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div
                            class="@if ($rank == 1) gradient-primary text-white @elseif($rank == 2) bg-gray-100 text-gray-800 @else bg-orange-100 text-gray-800 @endif rounded-t-2xl p-6 h-{{ $rank == 1 ? '40' : '32' }} flex flex-col justify-end text-center min-w-[140px]">
                            <h3 class="font-bold {{ $rank == 1 ? 'text-xl' : 'text-lg' }}">{{ $p['nama'] ?? '-' }}</h3>
                            <p class="text-{{ $rank == 1 ? 'purple-100' : 'gray-600' }} text-sm">{{ $p['nim'] ?? '-' }}</p>
                            <p class="text-xs mt-2 {{ $rank == 1 ? 'text-purple-200' : 'text-gray-500' }}">Nilai KI:
                                {{ isset($p['nilaiKi']) ? number_format($p['nilaiKi'], 4) : '-' }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Juara 4-10 di bawahnya -->
        <div class="max-w-xl mx-auto">
            <div class="bg-gray-50 rounded-2xl p-6 animate-on-scroll">
                <h3 class="text-xl font-bold text-gray-800 mb-6 text-center">Peringkat 4 - 10</h3>
                <div class="space-y-3">
                    @foreach ($others as $idx => $row)
                        <div
                            class="flex items-center gap-3 p-3 bg-white rounded-xl hover:shadow-md transition-all duration-300 group">
                            <div
                                class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold bg-gray-200 text-gray-600">
                                {{ $idx + 4 }}
                            </div>
                            <div
                                class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-700 font-bold text-lg">
                                {{ avatar_initial($row['nama'] ?? '-') }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p
                                    class="font-medium text-gray-800 text-sm truncate group-hover:text-teal-600 transition-colors">
                                    {{ $row['nama'] ?? '-' }}
                                </p>
                                <p class="text-xs text-gray-500 truncate">{{ $row['nim'] ?? '-' }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-semibold text-teal-600">
                                    {{ isset($row['nilaiKi']) ? number_format($row['nilaiKi'], 4) : '-' }}
                                </p>
                                <p class="text-xs text-gray-500">Nilai KI</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
