
@extends('layouts.main')

@section('title', '井上Bike')

@section('content')

<div class="stock">
    <h2 class="regist_list">在庫追加</h2>
    <a class="regist_btn" href="{{ route('showList') }}">←戻る</a>
</div>

<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <select name="company_id" class="form-control">
            <option value="">メーカーを選択してください</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
            @endforeach
        </select>
				@error('company_id')
				<span class="error_m">メーカーを選択してください</span>
				@enderror
    </div>

    <div class="form-group">
        <input type="text" name="product_name" class="form-control" value="{{ old('product_name') }}" placeholder="商品名">
				@error('product_name')
				<span class="error_m">商品名を入力してください</span>
				@enderror
    </div>

    <div class="form-group">
        <input type="text" name="price" class="form-control" value="{{ old('price') }}" placeholder="価格">
				@error('price')
				<span class="error_m">価格を入力してください</span>
				@enderror
		</div>

    <div class="form-group">
        <input type="text" name="stock" class="form-control" value="{{ old('stock') }}" placeholder="在庫数">
				@error('stock')
				<span class="error_m">在庫数を入力してください</span>
				@enderror
		</div>

    <div class="form-group">
        <input type="text" name="engine" class="form-control" value="{{ old('engine') }}" placeholder="排気量">
				@error('engine')
				<span class="error_m">排気量を入力してください</span>
				@enderror
		</div>

    <div class="form-group">
        <input type="text" name="driving" class="form-control" value="{{ old('driving') }}" placeholder="走行距離">
				@error('driving')
				<span class="error_m">走行距離を入力してください</span>
				@enderror
		</div>

    <div class="form-group">
        <input type="text" name="comment" class="form-control" value="{{ old('comment') }}" placeholder="コメント">
				@error('comment')
				<span class="error_m">コメントを入力してください</span>
				@enderror
		</div>

    <div class="submit">
        <button type="submit" class="submit_btn" onclick="return confirm('登録しますか？')">登録する</button>
    </div>
</form>
@endsection