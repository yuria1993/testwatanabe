<x-guest-layout>

  <p class="text-center text-[24px] py-5">ご覧いただきありがとうございました。</p>

  <div class="flex justify-center py-5">
    <form method="post" action="">
      @csrf
      <button type="submit" class="text-center bg-black border-4 border-black text-white rounded-md">トップページへ</button>
    </form>
  </div>

</x-guest-layout>