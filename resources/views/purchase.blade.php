
@extends('layouts.main')

@section('title', '井上Bike')

@section('content')

<div class="stock">
    <h2 class="purchase_list">購入手続き</h2>
    <a class="regist_btn" href="{{ route('showList') }}">←戻る</a>
</div>

<form action="{{ route('purchase.store', $product->id) }}" method="POST" enctype="multipart/form-data">

	@csrf

	<table class="table">
			<div class="purchase_group">
				<tr><th>ID:</th><td>{{ $product->id }}</td></tr>
			</div>
			<div class="purchase_group">
				 <tr><th>メーカー名:</th><td>{{ $product->company->company_name }}</td></tr>
			</div>
			<div class="purchase_group">
				<tr><th>商品名:</th><td>{{ $product->product_name }}</td></tr>
			</div>
			<div class="purchase_group">
				<tr><th>価格:</th><td>{{ $product->price }}万円</td></tr>
			</div>
			<div class="purchase_group">
				<tr><th>在庫数:</th><td>{{ $product->stock }}台</td></tr>
			</div>
			<div class="purchase_group">
				<tr><th>排気量:</th><td>{{ $product->engine }}cc</td></tr>
			</div>
			<div class="purchase_group">
				<tr><th>走行距離:<td>{{ $product->driving }}km</td></tr>
			</div>
			<div class="purchase_group">
				<tr><th>コメント:<td>{{ $product->comment }}</td></tr>
			</div>
			<div class="purchase_group">
				<tr><th>購入台数:
					<td>
						<input type="number" name="quantity" min="1" max="{{ $product->stock }}" required>
					</td>
				</tr>
			</div>
		</table>
		<button type="submit" class="submit_btn" onclick="return confirm('購入しますか？')">購入する</button>
</form>

@endsection