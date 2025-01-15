<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Beauty\BeautyRequest;
use App\Http\Services\Beauty\BeautyAdminService;
use App\Models\Beauty;
use Illuminate\Http\Request;

class BeautyController extends Controller
{
    protected $beautyService;

    public function __construct(BeautyAdminService $beautyService)
    {
        $this->beautyService = $beautyService;
    }

    public function index()
    {
        return view('admin.beauty.list', [
            'title' => 'Danh Sách Dịch Vụ',
            'beauties' => $this->beautyService->get()
        ]);
    }

    public function create()
    {
        return view('admin.beauty.add', [
            'title' => 'Thêm Dịch Vụ Mới',
            'menus' => $this->beautyService->getMenu()
        ]);
    }


    public function store(BeautyRequest $request)
    {
        $this->beautyService->insert($request);

        return redirect()->back();
    }

    public function show(Beauty $beauty)
    {
        return view('admin.beauty.edit', [
            'title' => 'Chỉnh Sửa Dịch Vụ',
            'beauty' => $beauty,
            'menus' => $this->beautyService->getMenu()
        ]);
    }


    public function update(Request $request, Beauty $beauty)
    {
        $result = $this->beautyService->update($request, $beauty);
        if ($result) {
            return redirect('/admin/beauties/list');
        }

        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->beautyService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công dịch vụ'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}