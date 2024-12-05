



<head>
	<meta charset="UTF-8">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0">

	<!-- These are the jQuery extensions taken from
		bootstrap website to enable the drop down
		function of the menu bar -->
	<link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">

	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
	</script>

	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js">
	</script>

	<!-- Default bootstrap CSS link taken from the
		bootstrap website-->
	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
	</script>

	<style>
		*{
			margin: 0; padding: 0; box-sizing: border-box;
		}
		body{
			justify-content: center;
			align-items: center;
			min-height: 100%;
		}
		.form{
			margin: 2% 20%;
		}
		.mul-select {
			min-width: 100%;
		}
		
		h1 {
			color: #fff;
		}
	</style>
</head>

<body>
<div class="container">


<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
        <h1 class="text-center" style="color:#b12222;">Add New package</h1>

            <div class="card">
                <div class="d-flex justify-content-between mb-3">
                   
                    <a href="{{ route('Admin.packages.index') }}" class="btn btn-primary">Back</a>
                </div>

                <h1>{{ isset($package) ? 'Edit Package' : 'Add New Package' }}</h1>
                <form action="{{ isset($package) ? route('packages.update', $package) : route('packages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($package)) @method('PUT') @endif

                    <div class="form-group">
                        <label for="name">Package Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $package->name ?? old('name') }}" required>
                    </div>

                 

		<!-- These modifications are done to make the webpage
			adaptive to the screen size and automatically
			reduce the size when screen is minimized -->
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-12 col-md-6 col-12">
          
				<div class="form-group form">
                <label for="name">Exam Select Name </label>
					<!-- Various options in drop down menu to
						select the types of data structures
						that we need -->
					<select name="exams[]"  class="mul-select" multiple="true">
                    @foreach(\App\Models\Exam::all() as $exam)
                <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
            @endforeach
					</select>
				</div>
			</div>
		</div>
        <div class="form-group">
                        <label for="payment_type">Payment Type</label>
                        <select name="payment_type" class="form-control" required>
                            <option value="free" {{ (isset($package) && $package->payment_type == 'free') ? 'selected' : '' }}>Free</option>
                            <option value="paid" {{ (isset($package) && $package->payment_type == 'paid') ? 'selected' : '' }}>Paid</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" class="form-control" value="{{ $package->amount ?? old('amount') }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control">{{ $package->description ?? old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-check">
                        <label class="form-check-label" for="active"> active
                        <input type="checkbox" name="active" value="1" {{ old('active') ? 'checked' : '' }}>

                        </label>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">{{ isset($package) ? 'Update' : 'Create' }} Package</button>
                </form>

	<!-- JavaScript code to enable the drop down function -->
	<script>
		$(document).ready(function() {
			$(".mul-select").select2({
				placeholder: "select data-structures",
				tags: true,
			});
		})
	</script>
</body>

</html>
