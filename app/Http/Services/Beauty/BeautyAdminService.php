<?php


namespace App\Http\Services\Beauty;


use App\Models\Beauty;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class BeautyAdminService
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    protected function isValidPrice($request)
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return  true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $request->except('_token');
            Beauty::create($request->all());

            Session::flash('success', 'Thêm Dịch vụ thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Dịch vụ lỗi');
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }

    public function get()
    {
        return Beauty::with('menu')
            ->orderByDesc('id')->paginate(15);
    }

    public function update($request, $beauty)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $beauty->fill($request->input());
            $beauty->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $beauty = Beauty::where('id', $request->input('id'))->first();
        if ($beauty) {
            $beauty->delete();
            return true;
        }

        return false;
    }
}