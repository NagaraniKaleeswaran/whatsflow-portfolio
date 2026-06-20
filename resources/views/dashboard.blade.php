<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    @if(session('portfolio_mode') || request('portfolio') == 1)
        <div class="w-full">
            <img src="{{ asset('images/portfolio/dashboard.png') }}" alt="Dashboard Portfolio" class="w-full h-auto block">
        </div>
    @else
    <!-- Top Metrics -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center justify-between kpi-card">
            <div class="flex items-center">
                <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Leads</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($totalLeads) }}</p>
                </div>
            </div>
            <div class="px-2.5 py-1 bg-green-50 text-green-700 text-xs font-bold rounded-full flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                12%
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center justify-between kpi-card">
            <div class="flex items-center">
                <div class="p-3 bg-green-50 text-green-600 rounded-xl mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Conversations</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($totalConversations) }}</p>
                </div>
            </div>
            <div class="px-2.5 py-1 bg-green-50 text-green-700 text-xs font-bold rounded-full flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                8%
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center justify-between kpi-card">
            <div class="flex items-center">
                <div class="p-3 bg-purple-50 text-purple-600 rounded-xl mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Campaigns</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($totalCampaigns) }}</p>
                </div>
            </div>
            <div class="px-2.5 py-1 bg-green-50 text-green-700 text-xs font-bold rounded-full flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                15%
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center justify-between kpi-card">
            <div class="flex items-center">
                <div class="p-3 bg-blue-50 text-blue-600 rounded-xl mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Messages</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($totalMessages) }}</p>
                </div>
            </div>
            <div class="px-2.5 py-1 bg-green-50 text-green-700 text-xs font-bold rounded-full flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                22%
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Lead Growth -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Lead Growth (30 Days)</h3>
            <div class="relative h-64 w-full">
                <canvas id="leadGrowthChart"></canvas>
            </div>
        </div>

        <!-- Message Volume -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Message Volume</h3>
            <div class="relative h-64 w-full">
                <canvas id="messageVolumeChart"></canvas>
            </div>
        </div>

        <!-- Lead Status -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Lead Status Distribution</h3>
            <div class="relative h-64 w-full flex justify-center">
                <canvas id="leadStatusChart"></canvas>
            </div>
        </div>

        <!-- Campaign Performance -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Campaign Performance</h3>
            <div class="relative h-64 w-full flex justify-center">
                <canvas id="campaignChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Activity Widgets -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Recent Leads -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-5 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                <h3 class="text-base font-semibold text-gray-800">Recent Leads</h3>
                <a href="{{ route('leads.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">View All</a>
            </div>
            <div class="p-0">
                @forelse($recentLeads as $lead)
                    <div class="flex items-center justify-between p-4 border-b border-gray-50 hover:bg-gray-50 transition-colors last:border-0 widget-item">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xs">
                                {{ strtoupper(substr($lead->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ $lead->name }}</p>
                                <p class="text-xs text-gray-500">{{ $lead->phone }}</p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 text-[10px] uppercase tracking-wider font-bold rounded-full bg-blue-50 text-blue-700">{{ $lead->status }}</span>
                    </div>
                @empty
                    <div class="p-8 text-center text-sm text-gray-500">
                        <svg class="w-8 h-8 mx-auto text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        No leads found.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Conversations -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-5 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                <h3 class="text-base font-semibold text-gray-800">Active Chats</h3>
                <a href="{{ route('inbox.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">Inbox</a>
            </div>
            <div class="p-0">
                @forelse($recentConversations as $conv)
                    <div class="flex items-center justify-between p-4 border-b border-gray-50 hover:bg-gray-50 transition-colors last:border-0 widget-item">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center font-bold text-xs">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ $conv->lead->name ?? $conv->phone_number }}</p>
                                <p class="text-xs text-gray-500 truncate max-w-[150px]">{{ $conv->last_message_preview ?: 'No messages yet' }}</p>
                            </div>
                        </div>
                        <span class="text-xs font-medium text-gray-400">{{ $conv->last_message_at ? $conv->last_message_at->shortAbsoluteDiffForHumans() : 'New' }}</span>
                    </div>
                @empty
                    <div class="p-8 text-center text-sm text-gray-500">
                        <svg class="w-8 h-8 mx-auto text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        No active chats.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Campaigns -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-5 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                <h3 class="text-base font-semibold text-gray-800">Recent Campaigns</h3>
                <a href="{{ route('campaigns.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">View All</a>
            </div>
            <div class="p-0">
                @forelse($recentCampaigns as $campaign)
                    <div class="flex items-center justify-between p-4 border-b border-gray-50 hover:bg-gray-50 transition-colors last:border-0 widget-item">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-xs">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ $campaign->title }}</p>
                                <p class="text-xs text-gray-500">{{ $campaign->scheduled_at ? $campaign->scheduled_at->format('M d, g:i A') : 'Draft' }}</p>
                            </div>
                        </div>
                        @php
                            $statusColors = [
                                'draft' => 'bg-gray-100 text-gray-700',
                                'scheduled' => 'bg-amber-100 text-amber-700',
                                'running' => 'bg-blue-100 text-blue-700',
                                'completed' => 'bg-green-100 text-green-700',
                            ];
                            $color = $statusColors[$campaign->status] ?? 'bg-gray-100 text-gray-700';
                        @endphp
                        <span class="px-2.5 py-1 text-[10px] uppercase tracking-wider font-bold rounded-full {{ $color }}">{{ $campaign->status }}</span>
                    </div>
                @empty
                    <div class="p-8 text-center text-sm text-gray-500">
                        <svg class="w-8 h-8 mx-auto text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                        No campaigns found.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Chart Defaults
            Chart.defaults.font.family = "'Inter', 'sans-serif'";
            Chart.defaults.color = '#9ca3af';
            Chart.defaults.scale.grid.color = '#f8fafc';
            Chart.defaults.scale.grid.drawBorder = false;
            Chart.defaults.plugins.tooltip.backgroundColor = '#1e293b';
            Chart.defaults.plugins.tooltip.padding = 12;
            Chart.defaults.plugins.tooltip.cornerRadius = 8;
            Chart.defaults.plugins.tooltip.titleFont = { size: 14, family: "'Inter', 'sans-serif'", weight: '600' };
            Chart.defaults.plugins.tooltip.bodyFont = { size: 13, family: "'Inter', 'sans-serif'" };

            // 1. Lead Growth Chart
            new Chart(document.getElementById('leadGrowthChart'), {
                type: 'line',
                data: {
                    labels: {!! json_encode($leadGrowthLabels) !!},
                    datasets: [{
                        label: 'New Leads',
                        data: {!! json_encode($leadGrowthData) !!},
                        borderColor: '#6366f1',
                        backgroundColor: 'rgba(99, 102, 241, 0.1)',
                        borderWidth: 3,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#6366f1',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: { 
                        y: { beginAtZero: true, border: { display: false } },
                        x: { border: { display: false } }
                    },
                    interaction: { mode: 'index', intersect: false }
                }
            });

            // 2. Message Volume Chart
            new Chart(document.getElementById('messageVolumeChart'), {
                type: 'bar',
                data: {
                    labels: {!! json_encode($messageLabels) !!},
                    datasets: [
                        {
                            label: 'Inbound',
                            data: {!! json_encode($inboundData) !!},
                            backgroundColor: '#22c55e',
                            borderRadius: 6,
                            barPercentage: 0.6
                        },
                        {
                            label: 'Outbound',
                            data: {!! json_encode($outboundData) !!},
                            backgroundColor: '#6366f1',
                            borderRadius: 6,
                            barPercentage: 0.6
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top', align: 'end', labels: { usePointStyle: true, boxWidth: 8 } }
                    },
                    scales: {
                        x: { stacked: true, border: { display: false }, grid: { display: false } },
                        y: { stacked: true, beginAtZero: true, border: { display: false } }
                    },
                    interaction: { mode: 'index', intersect: false }
                }
            });

            // 3. Lead Status Chart
            new Chart(document.getElementById('leadStatusChart'), {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($leadStatusLabels) !!},
                    datasets: [{
                        data: {!! json_encode($leadStatusData) !!},
                        backgroundColor: [
                            '#3b82f6', // blue (new)
                            '#8b5cf6', // purple (contacted)
                            '#f59e0b', // yellow (qualified)
                            '#22c55e', // green (converted)
                            '#ef4444'  // red (lost)
                        ],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: { position: 'right' }
                    }
                }
            });

            // 4. Campaign Chart
            new Chart(document.getElementById('campaignChart'), {
                type: 'pie',
                data: {
                    labels: {!! json_encode($campaignLabels) !!},
                    datasets: [{
                        data: {!! json_encode($campaignData) !!},
                        backgroundColor: [
                            '#10b981', // green (completed)
                            '#3b82f6', // blue (running)
                            '#f59e0b', // yellow (scheduled)
                            '#9ca3af'  // gray (draft)
                        ],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'right' }
                    }
                }
            });
        });
    </script>
    @endif
</x-app-layout>
