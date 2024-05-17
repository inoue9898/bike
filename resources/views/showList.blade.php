@extends('layouts.main')

@section('title','井上Bike')
@section('content')

@if(session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif


<div class="stock">
	<h2 class="stock_list">在庫一覧</h2>
	<a class="regist_btn" href="regist">在庫追加</a>
</div>

<div class="table_list">
	<table id="fav-table" class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>メーカー名</th>
				<th>商品名</th>
				<th> 価格</th>
				<th>在庫数</th>
				<th>排気量</th>
				<th>走行距離</th>
			</tr>
		</thead>

		<tbody class="tbody_list">
			@foreach($products as $product)
				<tr>
					<td>{{ $product->id }}</td>
					<td>{{ $product->company->company_name }}</td>
					<td>{{ $product->product_name }}</td>
					<td>{{ $product->price }}万円</td>
					<td>{{ $product->stock }}台</td>
					<td>{{ $product->engine }}cc</td>
					<td>{{ $product->driving }}km</td>
					<td>
						<a class="store_btn" href="{{ route('purchase', $product->id) }}">購入手続き</a>
					</td>
					<td>
						<a class="delete_btn" href="{{ route('delete', $product->id) }}" onclick="return confirm('削除しますか？')">削除</a>
					</td>

				</tr>
				@endforeach
		</tbody>
	</table>
</div>

@endsection