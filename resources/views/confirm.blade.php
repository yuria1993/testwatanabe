<x-guest-layout>


    {{--ヘッダー--}}
    <div class="py-12 text-xl text-gray-900 text-center">内容確認
    </div>

    <form method="post" action="{{ route('send') }}">
        @csrf

        <div class="text-left">
            {{--名前--}}
            <p class="py-3">お名前</p>
            {{$contents['fullname']}}
            <input type="hidden" name="family-name" value="{{$contents['family-name']}}">
            <input type="hidden" name="given-name" value="{{$contents['given-name']}}">
            <input type="hidden" name="fullname" value="{{$contents['fullname']}}">


            {{--性別--}}
            <p class=" py-3">性別</p>
            @if($contents['gender'] === '1')
                男性
            @elseif($contents['gender'] === '2')
                女性
            @endif
            <input type="hidden" name="gender" value="{{$contents['gender']}}">

            {{--メールアドレス--}}
            <p class="py-3">メールアドレス</p>
            {{$contents['email']}}
            <input type="hidden" name="email" value="{{$contents['email']}}">

            {{--郵便番号--}}
            <p class="py-3">郵便番号</p>
            {{$contents['postcode']}}
            <input type="hidden" name="postcode" value="{{$contents['postcode']}}">

            {{--住所--}}
            <p class="py-3">住所</p>
            {{$contents['address']}}
            <input type="hidden" name="address" value="{{$contents['address']}}">

            {{--建物名--}}
            <p class="py-3">建物名</p>
            {{$contents['building']}}
            <input type="hidden" name="building_name" value="{{$contents['building']}}">

            {{--ご意見--}}
            <p class="py-3">ご意見</p>
            {{$contents['opinion']}}
            <input type="hidden" name="opinion" value="{{$contents['opinion']}}">

            {{--送信--}}
            <div class="flex justify-center py-3">
                <button type="submit" class="text-center bg-black border-4 border-black text-white rounded-md">送信
                </button>
            </div>
        </div>


        {{--修正--}}
        <div class="flex justify-center py-3">

            <button type="submit" value="back" name="back" class="border-b-2 border-gray-600">修正する
            </button>
        </div>
    </form>


    </div>
</x-guest-layout>
