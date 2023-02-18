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
                            <input type="text" class="w-96 rounded-md" name="fullname">
                        </div>

                        {{--性別--}}
                        <div class="flex-1 w-32">
                            <p>性別</p>
                            <input type="radio" name="gender" value="" checked>全て
                            <input type="radio" name="gender" value="1">男性
                            <input type="radio" name="gender" value="2">女性
                        </div>
                    </div>

                    {{--登録日--}}
                    <div class="mt-3">
                        <p>登録日</p>
                        <div class="flex pb-2">
                            <input type="text" name="year" class="rounded-md">
                            <p class="text-lg p-3"> ー</p>
                            <input type="text" name="data" class="rounded-md">
                        </div>
                    </div>

                    {{--メールアドレス--}}
                    <div class="mt-3">
                        <p>メールアドレス</p>
                        <input type="text" name="email" class="rounded-md w-full">
                    </div>

                    {{--検索--}}
                    <div class="flex justify-center py-3">
                        <button type="submit" name="keyword"
                                class="text-center  bg-black border-4 border-black text-white rounded-md">検索
                        </button>
                    </div>

                    {{--リセット--}}
                    <div class="flex justify-center py-3">
                        <div class="pb-3">
                            <button type="submit" a href="{{route('system')}}" value="back" name="back"
                                    class="border-b-2 border-gray-600">リセット
                            </button>
                        </div>
                    </div>
                </div>


                {{--検索結果--}}


                <div class="paginate">
                    {{$contents->links()}}

                    <table class="text-center w-full" name="keyword">
                        <tr>
                            <th scope="col">お名前</th>
                            <th scope="col">性別</th>
                            <th scope="col">メールアドレス</th>
                            <th scope="col">ご意見</th>
                        </tr>


                        @foreach($contents as $content)
                            <input type="hidden" value="{{$keyword}}">
                            <tr>
                                <td>{{$content->fullname}}</td>
                                <td>
                                    @if($contents->gender==='1')
                                        男性
                                    @elseif($contents->gender==='2')
                                        女性
                                    @endif
                                </td>
                                <td>{{$content->email}}</td>
                                <td>{{$content->opinion}}</td>
                            </tr>
                        @endforeach

                    </table>

                </div>
            </div>
        </form>
    </div>


</x-guest-layout>
