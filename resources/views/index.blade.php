<x-guest-layout>

  <div class="w-full h-full bg--white overflow-hidden shadow-sm sm:rounded-lg">
    <div class=" bg-white rounded-md">

      {{--ヘッダー--}}
      <div class="flex justify-center">
        <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-12 text-xl text-gray-900 text-center">お問い合わせ

            </div>
          </div>
          <form method="post" class="h-adr" action="{{route('confirm')}}">
            @csrf
            <input type="hidden" class="p-country-name" value="Japan">

            {{--入力画面--}}


            {{--名前--}}
            <p class="py-3">お名前</p><input type="text" name="family-name" value="{{old('family-name', '')}}" placeholder="例)山田">
            <input type="text" name="given-name" value="{{old('given-name', '')}}" placeholder="例)太郎">
            @if($errors->has('fullname'))
            @foreach($errors->get('fullname') as $message)
            <p class="text-red-500">{{ $message }}</p>
            @endforeach
            @endif

            {{--性別--}}
            <p class="py-3">性別</p><input type="radio" name="gender" value="1" {{ old('gender', "1")  === "1" ? "checked" : '' }}>男性
            <input type="radio" name="gender" value="2" {{ old('gender')  === "2" ? 'checked' : '' }}>女性


            {{--メールアドレス--}}
            <p class="py-3">メールアドレス</p><input type="email" class="w-full" value="{{old('email', '')}}" name="email" placeholder="例)test@example.com">
            @if($errors->has('email'))
            <p class="text-red-500">{{ $errors->first('email') }}</p>
            @endif

            {{--郵便番号--}}
            <p class="py-3">郵便番号</p>〒<input type="text" class="w-full p-postal-code" size="8" maxlength="8" name="postcode" value="{{old('postcode', '')}}" placeholder="例)123-4567">
            @if($errors->has('postcode'))
            <p class="text-red-500">{{ $errors->first('postcode') }}</p>
            @endif

            {{--住所--}}
            <p class="py-3">住所</p><input type="text" class="w-full p-region p-locality p-street-address p-extended-address" name="address" value="{{old('address', '')}}" placeholder="例)東京都渋谷区千駄ヶ谷1-2-3">
            @if($errors->has('address'))
            <p class="text-red-500">{{ $errors->first('address') }}</p>
            @endif

            {{--建物名--}}
            <p class="py-3">建物名</p><input type="text" class="w-full" name="building" value="{{old('building_name', '')}}" placeholder="例)千駄ヶ谷マンション101">

            {{--ご意見--}}
            <p class="py-3">ご意見</p><textarea name="opinion" class="w-full">{{old('opinion', '')}}</textarea>
            @if($errors->has('opinion'))
            <p class="text-red-500">{{ $errors->first('opinion') }}</p>
            @endif

            {{--確認--}}
            <div class="flex justify-center py-3">
              <button type="submit" class="text-center  bg-black border-4 border-black text-white rounded-md">確認</button>
            </div>

          </form>

          </form>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>