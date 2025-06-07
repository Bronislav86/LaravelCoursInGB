<html>
	<head>
		<title>Form for new Book</title>
		<meta name="csrf-token" content="{{csrf_token()}}" />
	</head>
	<body>
		<div class="add-books_form-wrapper">
			<form name="add_new_book" id="add_new_book" method='post' action="{{Route('store_book')}}">
				@csrf
				<div class="form-section">
					<label for="title">Title</label>
					<input type="text" name="title" id="title" class="form-control"/>
				</div>
				<div class="form-section">
					<label for="author">Author</label>
					<input type="text" name="author" id="author" class="form-control" required />
				</div>
				<div class="form-section">
					<label for="genre">Choose genre:</label>
					<select name="genre" id="genre">
						<option value="fantasy">Fantasy</option>
						<option value="sci-fi">Sci-fi</option>
						<option value="mystery">Mystery</option>
						<option value="drama">Drama</option>
					</select>
				</div>
				<button class="btn btn-primary" type="submit">Submit</button>
			</form>
        @foreach($errors->all() as $error)
            {{$error}} <br>
        @endforeach
		</div>
	</body>
</html>
