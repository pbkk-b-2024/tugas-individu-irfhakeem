@extends('layout.base')

@section('title', 'Routing Parameter')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title">1 Parameter</h5><br>
            <h5 class="card-title">Preview URL : <span id="preview-1"></span></h5>
        </div>
        <div class="card-body">
            <form id="form1" method="GET" action="">
                <div class="form-group">
                    <label for="param1">Parameter 1:</label>
                    <input class="border-[1px] border-black form-control" type="text" id="param1" name="param1"
                        placeholder="Enter parameter 1" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Card for 2 Parameters Form -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">2 Parameters</h5><br>
            <h5 class="card-title">Preview URL : <span id="preview-2"></span></h5>
        </div>
        <div class="card-body">
            <form id="form2" method="GET" action="">
                <div class="form-group">
                    <label for="param1-2">Parameter 1:</label>
                    <input class="border-[1px] border-black form-control" type="text" id="param1-2" name="param1"
                        placeholder="Enter parameter 1" required>
                </div>
                <div class="form-group">
                    <label for="param2-2">Parameter 2:</label>
                    <input class="border-[1px] border-black form-control" type="text" id="param2-2" name="param2"
                        placeholder="Enter parameter 2" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
