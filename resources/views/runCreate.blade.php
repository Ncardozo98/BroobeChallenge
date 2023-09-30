<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-layouts.app title="Crear Run">
    <div class="m-5 p-5 border border-black shadow form-group row">
        <div id="get-metrics">
            <div class="row">
                <div class="col-3">
                    <label for="url">URL</label>
                    <x-input-url id="url" placeholder="URL" />
                </div>
                <div class="col text-center">
                    <label>Categories</label>
                    <div class="m-3">
                        <div class="mt-2">
                            <input type="checkbox" id="pwa_check" name="pwa_check" value="pwa">
                            <label for="pwa_check">PWA</label>
                        </div>
                    </div>
                </div>
                <div class="col text-center pt-3">
                    <div class="mt-4">
                        <input type="checkbox" id="seo_check" name="seo_check" value="seo">
                        <label for="seo_check">SEO</label>
                    </div>
                </div>
                <div class="col text-center pt-3">
                    <div class="mt-4">
                        <input type="checkbox" id="performance_check" name="performance_check" value="performance">
                        <label for="performance_check">PERFORMANCE</label>
                    </div>
                </div>
                <div class="col-2 text-center pt-3">
                    <div class="mt-4">
                        <input type="checkbox" id="best_practice_check" name="best_practice_check" value="best_practices">
                        <label for="best_practice_check">BEST-PRACTICES</label>
                    </div>
                </div>
                <div class="col text-center pt-3">
                    <div class="mt-4">
                        <input type="checkbox" id="accesibility_check" name="accesibility_check" value="accessibility">
                        <label for="accesibility_check">ACCESIBILITY</label>
                    </div>
                </div>
                <div class="col-2">
                    <label for="strategy">STRATEGY</label>
                    <select class="form-select" id="strategy" aria-label="Default select example">
                        <option selected>Select Strategy</option>
                        @foreach ($strategies as $strategy)
                            <option value="{{ $strategy->id }}">{{ $strategy->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <x-button-primary id="get_metrics_button" onclick="callApi(this)" value="GET METRICS" />
                </div>
            </div>
        </div>
    </div>

    <div class="m-5 p-5 border border-black shadow form-group row" id="metrics" hidden>
        {{-- Dinamyc content --}}
    </div>
</x-layouts.app>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>

    function getCategories(){
        let categories = "";
        $("input:checkbox:checked").each(function(){
            categories += '&category='+$(this).val();
        });
        return categories;
    }

    function saveMetric(e){
        $('#metric_button').attr('disabled', true);

        let vars = {
            url: $('#url').val(),
            pwa: $('#pwa').text(),
            seo: $('#seo').text(),
            performance: $('#performance').text(),
            best_practices: $('#best_practices').text(),
            accesibility: $('#accesibility').text(),
            strategy: $('#strategy option:selected').text(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url: "{{ route('run.store') }}",
            type: 'POST',
            dataType: 'json',
            data: vars,
            success: function(data){
                console.log(data);
                $('#metric_button').removeAttr('disabled');
            }
        });
    }

    function callApi(e){
        $('#get_metrics_button').attr('disabled', true);
        let url = $('#url').val();
        let categories = getCategories();
        let strategy = $('#strategy option:selected').text();

        $.ajax({
            url: 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=https://'+url+'&key=AIzaSyDCrPAzhzWxZbJxPYIEURODTvBFVVRNHbY'+categories+'&strategy='+strategy,
            type: 'GET',
            dataType: 'json',
            beforeSend: function(){
                Swal.fire({
                    title: 'Please wait...',
                    html: 'We are getting the metrics for you!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });
            },
            success: function(data){
                Swal.close();
                console.log(data);
                let metrics = data.lighthouseResult.categories;
                let html = "<form action='{{ route('run.store') }}' method='POST'>";
                html += '<div class="row">';
                $.each(metrics, function(key, value){
                    html += '<div class="col-2">';
                    html += '<div class="card">';
                    html += '<div class="card-body">';
                    html += '<h5 class="card-title">'+value.title+'</h5>';
                    html += '<p id="'+value.id+'" class="card-text fs-1">'+value.score+'</p>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                });
                html += '</div>';
                html += '<button id="metric_button" type="button" class="btn btn-primary mt-3" onclick="saveMetric(this)">SAVE METRIC RUN</button>';

                $('#metrics').html(html);
                $('#metrics').removeAttr('hidden');
            }
        });
    }
</script>