<x-guest-layout>
    <div>
        <form action="{{route('system')}}" method="get">
            @csrf

            <div class="max-w-screen max-h-screen">


                <div class="text-center pb-12 text-[36px] text-gray-900">
                    管理システム
                </div>

                <div class="border-4 border-black m-3 p-3">

                    {{--名前--}}
                    <div class="flex">
                        <div class="flex-1">
                            <p>お名前</p>
                            <input type="text" class="w-96 rounded-md" name="fullname" value="{{old('fullname')}}">
                        </div>

                        {{--性別--}}
                        <div class="flex-1 w-32">
                            <p>性別</p>
                            <input type="radio" name="gender" value="" {{ is_null(old('gender'))  ? "checked" : '' }}>全て
                            <input type="radio" name="gender" value="1" {{ old('gender')  === "1" ? "checked" : '' }}>男性
                            <input type="radio" name="gender" value="2" {{ old('gender')  === "2" ? "checked" : '' }}>女性
                        </div>
                    </div>

                    {{--登録日--}}
                    <div class="mt-3">
                        <p>登録日</p>
                        <div class="flex pb-2">
                            <input type="date" name="created_at_from" value="{{old('created_at_from')}}"
                                   class="rounded-md">
                            <p class="text-lg p-3"> ー</p>
                            <input type="date" name="created_at_to" value="{{old('created_at_to')}}" class="rounded-md">
                        </div>
                    </div>

                    {{--メールアドレス--}}
                    <div class="mt-3">
                        <p>メールアドレス</p>
                        <input type="text" name="email" value="{{old('email')}}" class="rounded-md w-full">
                    </div>

                    {{--検索--}}
                    <div class="flex justify-center py-3">
                        <button type="submit"
                                class="bg-black text-white font-bold py-2 px-4 rounded">検索
                        </button>
                    </div>

                    {{--リセット--}}
                    <div class="flex justify-center">
                        <div class="pb-3">
                            <button><a href="{{route('system')}}" class="border-b-2 border-gray-600">リセット</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        {{--検索結果--}}


        <div class="paginate">
            {{$contents->appends(request()->query())->links()}}

            <form method="post">
                @method('delete')
                @csrf
                <table class="text-center w-full">
                    <tr>
                        <th scope="col">お名前</th>
                        <th scope="col">性別</th>
                        <th scope="col">メールアドレス</th>
                        <th scope="col">ご意見</th>
                        <th></th>
                    </tr>


                    @foreach($contents->items() as $content)
                        <tr>
                            <td>{{$content->fullname}}</td>
                            <td>
                                @if($content->gender===1)
                                    男性
                                @elseif($content->gender===2)
                                    女性
                                @endif
                            </td>
                            <td>{{$content->email}}</td>
                            <td class="w-1/2">
                                <span title="{{$content->opinion}}" class="short">{{$content->opinion}}</span>
                            </td>
                            <td>
                                <button class="bg-black text-white font-bold py-2 px-4 rounded"
                                        formaction="{{route('destroy', ['id' => $content->id])}}" type="submit">
                                    削除
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </form>

        </div>
    </div>

    <script>
        // テキストをトリミングする要素
        const selector = document.getElementsByClassName('short');
        // 制限する文字数
        const wordCount = 25;
        // 文末に追加したい文字
        const clamp = '…';

        for (let i = 0; i < selector.length; i++) {
            // 文字数を超えたら
            if (selector[i].innerText.length > wordCount) {
                let str = selector[i].innerText; // 文字数を取得
                str = str.substring(0, (wordCount - 1)); // 1文字削る
                selector[i].innerText = str + clamp; // 文末にテキストを足す
            }
        }

        document.querySelectorAll('.short').forEach(function (opinion) {
            opinion.addEventListener('mouseenter', function (e) {
                const title = e.target.title;
                const value = e.target.innerText;

                e.target.title = value;
                e.target.innerText = title;
            });
            opinion.addEventListener('mouseout', function (e) {
                const title = e.target.title;
                const value = e.target.innerText;

                e.target.title = value;
                e.target.innerText = title;
            });
        });
    </script>

</x-guest-layout>
