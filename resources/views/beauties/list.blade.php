<div class="row isotope-grid">
    @foreach($beauties as $key => $beauty)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2" style="width: 250px; height: 350px; margin: 0 auto; text-align: center; display: flex; flex-direction: column; justify-content: space-between; box-sizing: border-box;">
                <div class="block2-pic hov-img0" style="width:100%; height: 70%; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                    <img src="{{ $beauty->thumb }}" alt="{{ $beauty->name }}" style="width: 100%; height: 100%; object-fit: cover;">
<!--                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                        Quick View
                    </a>-->
                </div>

                <div class="block2-txt flex-w flex-t p-t-14" style="height: 30%; display: flex; flex-direction: column; justify-content: space-around;">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/san-pham/{{ $beauty->id }}-{{ Str::slug($beauty->name, '-') }}.html"
                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $beauty->name }}
                        </a>

                        <span class="stext-105 cl3">
							{!!  \App\Helpers\Helper::price($beauty->price, $beauty->price_sale)  !!}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

