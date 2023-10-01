<x-layouts.app title="Runs">
    <div class="m-5 p-5 border border-black shadow form-group row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">URL</th>
                    <th scope="col" class="text-center">ACCESIBILITY</th>
                    <th scope="col" class="text-center">PWA</th>
                    <th scope="col" class="text-center">SEO</th>
                    <th scope="col" class="text-center">PERFORMANCE</th>
                    <th scope="col" class="text-center">BEST PRACTICES</th>
                    <th scope="col" class="text-center">STRATEGY</th>
                    <th scope="col">DATETIME</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($runs as $run)
                    <tr>
                        <td>{{ $run->url }}</td>
                        <td class="text-center">{{ $run->accesibility_metric }}</td>
                        <td class="text-center">{{ $run->pwa_metric }}</td>
                        <td class="text-center">{{ $run->seo_metric }}</td>
                        <td class="text-center">{{ $run->performance_metric }}</td>
                        <td class="text-center">{{ $run->best_practices_metric }}</td>
                        <td class="text-center">{{ $run->getStrategy->name }}</td>
                        <td>{{ $run->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>