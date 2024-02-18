<?php

namespace App\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\Setting;
use App\Models\Info;
use App\Models\Page;
use App\Models\Brand;
use App\Models\Blog;
use App\Models\Activity;
use App\Models\CertificatePrice;
use App\Models\Notice;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Project;
use App\Models\Link;
use App\Models\Form;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{

  public function general()
  {
    return view('backend.content.settings.general.general');
  }

  public function logoStore(Request $request)
  {
    if (\request()->hasFile('frontend_logo_menu')) {
      $data['frontend_logo_menu'] = store_picture(\request()->file('frontend_logo_menu'), 'setting/logo');
    }
    if (\request()->hasFile('affiliate_logo')) {
      $data['affiliate_logo'] = store_picture(\request()->file('affiliate_logo'), 'setting/logo');
    }
    if (\request()->hasFile('frontend_logo_footer')) {
      $data['frontend_logo_footer'] = store_picture(\request()->file('frontend_logo_footer'), 'setting/logo');
    }
    if (\request()->hasFile('admin_logo')) {
      $data['admin_logo'] = store_picture(\request()->file('admin_logo'), 'setting/logo');
    }
    if (\request()->hasFile('favicon')) {
      $data['favicon'] = store_picture(\request()->file('favicon'), 'setting/logo');
    }
    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Logo Updated Successfully');
  }
  public function bannerstore(Request $request)
  {

    if (\request()->hasFile('banner_image')) {

      $data['banner_image'] = store_picture(\request()->file('banner_image'), 'setting/logo');
      Setting::save_settings($data);
    }
    if (\request()->hasFile('banner_image_back')) {

      $data['banner_image_back'] = store_picture(\request()->file('banner_image_back'), 'setting/logo');
      Setting::save_settings($data);
    }


    $data = \request()->only(['banner_link', 'banner_color_1', 'banner_color_2', 'banner_color_3', 'banner_text_header', 'banner_text_bottom']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Banner section Updated Successfully');
  }
  public function highlightstore(Request $request)
  {

    if (\request()->hasFile('highlight_image_1')) {

      $data['highlight_image_1'] = store_picture(\request()->file('highlight_image_1'), 'setting/logo');
      Setting::save_settings($data);
    }
    if (\request()->hasFile('highlight_image_2')) {

      $data['highlight_image_2'] = store_picture(\request()->file('highlight_image_2'), 'setting/logo');
      Setting::save_settings($data);
    }
    if (\request()->hasFile('highlight_image_3')) {

      $data['highlight_image_3'] = store_picture(\request()->file('highlight_image_3'), 'setting/logo');
      Setting::save_settings($data);
    }


    $data = \request()->only(['bg_color_1', 'text_color_1', 'highlight_header_1', 'highlight_description_1', 'bg_color_2', 'text_color_2', 'highlight_header_2', 'highlight_description_2', 'bg_color_3', 'text_color_3', 'highlight_header_3', 'highlight_description_3']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Highlight section Updated Successfully');
  }
  public function bottombanner(Request $request)
  {

    if (\request()->hasFile('bottombanner_image')) {

      $data['bottombanner_image'] = store_picture(\request()->file('bottombanner_image'), 'setting/logo');
      Setting::save_settings($data);
    }

    $data = \request()->only(['bottombanner_text_bottom', 'event_btn_color', 'event_btn_des', 'event_btn_name']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Bottom Banner section Updated Successfully');
  }
  public function noticecolorstore(Request $request)
  {

    if (\request()->hasFile('notice_image')) {

      $data['notice_image'] = store_picture(\request()->file('notice_image'), 'setting/logo');
      Setting::save_settings($data);
    }

    $data = \request()->only(['notice_color_1', 'notice_color_2', 'notice_color_3']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Bottom Banner section Updated Successfully');
  }
  public function aboutstore(Request $request)
  {

    if (\request()->hasFile('about_image_1')) {

      $data['about_image_1'] = store_picture(\request()->file('about_image_1'), 'setting/logo');
      Setting::save_settings($data);
    }


    $data = \request()->only(['about_color_1', 'about_color_2', 'about_color_3', 'about_text_header', 'about_text_bottom', 'about_text_details']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Brand section Updated Successfully');
  }
  public function volunteerSetting(Request $request)
  {

    $data = \request()->only(['volunteer_title', 'volunteer_description']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Volunteer section Updated Successfully');
  }
  public function apiStore(Request $request)
  {

    $data = \request()->only(['api_url', 'api_email', 'api_password']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Api section Updated Successfully');
  }
  public function workstore(Request $request)
  {

    if (\request()->hasFile('work_image_1')) {

      $data['work_image_1'] = store_picture(\request()->file('work_image_1'), 'setting/logo');
      Setting::save_settings($data);
    }
    $data = \request()->only(['work_text_header']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Activity section Updated Successfully');
  }
  public function homebg(Request $request)
  {

    if (\request()->hasFile('volunteer_bg_image')) {

      $data['volunteer_bg_image'] = store_picture(\request()->file('volunteer_bg_image'), 'setting/logo');
      Setting::save_settings($data);
    }
    $data = \request()->only(['about_bg_color', 'event_bg_color', 'brand_bg_color']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Home section Background  Color Updated Successfully');
  }
  public function donatesadd(Request $request)
  {
    if (\request()->hasFile('donates_image_1')) {

      $data['donates_image_1'] = store_picture(\request()->file('donates_image_1'), 'setting/logo');
      Setting::save_settings($data);
    }


    $data = \request()->only(['donates_text_header', 'donates_title_bg_color', 'cash', 'bank']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Donate section Updated Successfully');
  }

  public function socialStore(Request $request)
  {
    $data = request()->all();
    unset($data['_token']);

    if (\request()->hasFile('meta_image')) {
      $data['meta_image'] = store_picture(\request()->file('meta_image'), 'setting/meta');
    }

    if (\request()->hasFile('invoice_logo')) {
      $data['invoice_logo'] = store_picture(\request()->file('invoice_logo'), 'setting/logo');
    }


    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Setting Updated Successfully');
  }


  public function price()
  {
    return view('backend.content.settings.price-setting');
  }
  public function notice()
  {
    return view('backend.content.settings.notice.index');
  }
  public function noticestore(Request $request)
  {
    foreach ($request->title  as $key => $title) {
      $newImageName = time() . '.' . $request->multiimage[$key]->extension();
      $image = $request->multiimage[$key]->move(public_path('setting/banner'), $newImageName);
      $notice = new Notice;
      $notice->image = $newImageName;
      $notice->title = $request->title[$key];
      $notice->description = $request->description[$key];
      $notice->save();
    }

    return redirect()->back()->withFlashSuccess('Notice Store Successfully');
  }
  public function noticeedit($id)
  {
    $notice = DB::table('notices')->find($id);
    return view('backend.content.settings.notice.edit', compact('notice'));
  }

  public function noticeupdate(Request $request)
  {
    $id = $request->notice_id;
    $notice = Notice::find($id);
    if ($request->image) {
      $photo_path = public_path('setting/banner/') . $notice->image;
      if (File::exists($photo_path)) {
        File::delete($photo_path);
      }
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }

    $notice->image = $newImageName;
    $notice->title = $request->title;
    $notice->description = $request->description;
    $notice->is_active = $request->is_active;
    $notice->save();
    return redirect('/admin/setting/notice')->withFlashSuccess('Notice Updated Successfully');;
  }
  public function info()
  {
    return view('backend.content.settings.info.index');
  }
  public function infostore(Request $request)
  {
    foreach ($request->title  as $key => $title) {
      $newImageName = time() . '.' . $request->multiimage[$key]->extension();
      $image = $request->multiimage[$key]->move(public_path('setting/banner'), $newImageName);
      $info = new Info;
      $info->image = $newImageName;
      $info->title = $request->title[$key];
      $info->description = $request->description[$key];
      $info->save();
    }

    return redirect()->back()->withFlashSuccess('Notice Store Successfully');
  }
  public function infoedit($id)
  {
    $notice = DB::table('infos')->find($id);
    return view('backend.content.settings.info.edit', compact('notice'));
  }

  public function infoupdate(Request $request)
  {
    $id = $request->notice_id;
    $info = Info::find($id);
    if ($request->image) {
      $photo_path = public_path('setting/banner/') . $info->image;
      if (File::exists($photo_path)) {
        File::delete($photo_path);
      }
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }

    $info->image = $newImageName;
    $info->title = $request->title;
    $info->description = $request->description;
    $info->is_active = $request->is_active;
    $info->save();

    return redirect('/admin/setting/info')->withFlashSuccess('Notice Updated Successfully');;
  }
  public function page()
  {
    return view('backend.content.settings.page.index');
  }
  public function pagestore(Request $request)
  {
    $newImageName = time() . '.' . $request->image->extension();
    $image = $request->image->move(public_path('setting/banner'), $newImageName);
    $page = new Page;
    $page->image = $newImageName;
    $page->title = $request->title;
    $page->slug = $request->slug;
    $page->bgcolor = $request->bgcolor;
    $page->hearder = $request->hearder;
    $page->footer_left = $request->footer_left;
    $page->footer_right = $request->footer_right;
    $page->description = $request->description;
    $page->description_a = $request->description2;
    $page->description_b = $request->description3;
    $page->description_c = $request->description4;
    $page->save();
    return redirect()->back()->withFlashSuccess('Page Create Successfully');
  }
  public function pageedit($id)
  {
    $notice = DB::table('pages')->find($id);
    return view('backend.content.settings.page.edit', compact('notice'));
  }

  public function pageupdate(Request $request)
  {
    $id = $request->notice_id;
    $page = Page::find($id);
    if ($request->image) {
      $photo_path = public_path('setting/banner/') . $page->image;
      if (File::exists($photo_path)) {
        File::delete($photo_path);
      }
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }

    $page->image = $newImageName;
    $page->title = $request->title;
    $page->slug = $request->slug;
    $page->bgcolor = $request->bgcolor;
    $page->hearder = $request->hearder;
    $page->footer_left = $request->footer_left;
    $page->footer_right = $request->footer_right;
    $page->description = $request->description;
    $page->description_a = $request->description2;
    $page->description_b = $request->description3;
    $page->description_c = $request->description4;
    $page->is_active = $request->is_active;
    $page->save();

    return redirect('/admin/setting/page')->withFlashSuccess('Notice Updated Successfully');;
  }
  public function limit()
  {
    return view('backend.content.settings.order-limit-setting');
  }


  public function limitationStore()
  {
    $data = request()->all();
    unset($data['_token']);

    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Setting Updated Successfully');
  }


  public function message()
  {
    return view('backend.content.settings.message-setting');
  }


  public function messageStore()
  {
    $sms = \request('sms') ? 'sms_' : '';
    if ($sms) {
      $data['sms_active_otp_message'] = \request('sms_active_otp_message', null);
      $data['sms_otp_message'] = \request('sms_otp_message', null);
    }
    $data[$sms . 'active_waiting_for_payment'] = \request($sms . 'active_waiting_for_payment', null);
    $data[$sms . 'waiting_for_payment'] = \request($sms . 'waiting_for_payment', null);
    $data[$sms . 'active_partial_paid'] = \request($sms . 'active_partial_paid', null);
    $data[$sms . 'partial_paid'] = \request($sms . 'partial_paid', null);
    $data[$sms . 'active_purchased_message'] = \request($sms . 'active_purchased_message', null);
    $data[$sms . 'purchased_message'] = \request($sms . 'purchased_message', null);
    $data[$sms . 'active_shipped_from_suppliers'] = \request($sms . 'active_shipped_from_suppliers', null);
    $data[$sms . 'shipped_from_suppliers'] = \request($sms . 'shipped_from_suppliers', null);
    $data[$sms . 'active_received_in_china_warehouse'] = \request($sms . 'active_received_in_china_warehouse', null);
    $data[$sms . 'received_in_china_warehouse'] = \request($sms . 'received_in_china_warehouse', null);
    $data[$sms . 'active_shipped_from_china_warehouse'] = \request($sms . 'active_shipped_from_china_warehouse', null);
    $data[$sms . 'shipped_from_china_warehouse'] = \request($sms . 'shipped_from_china_warehouse', null);
    $data[$sms . 'active_received_in_bd_warehouse'] = \request($sms . 'active_received_in_bd_warehouse', null);
    $data[$sms . 'received_in_bd_warehouse'] = \request($sms . 'received_in_bd_warehouse', null);
    $data[$sms . 'active_on_transit_to_customer'] = \request($sms . 'active_on_transit_to_customer', null);
    $data[$sms . 'on_transit_to_customer'] = \request($sms . 'on_transit_to_customer', null);
    $data[$sms . 'active_delivered_completed'] = \request($sms . 'active_delivered_completed', null);
    $data[$sms . 'delivered_completed'] = \request($sms . 'delivered_completed', null);
    $data[$sms . 'active_adjustment'] = \request($sms . 'active_adjustment', null);
    $data[$sms . 'adjustment'] = \request($sms . 'adjustment', null);
    $data[$sms . 'active_canceled_by_seller'] = \request($sms . 'active_canceled_by_seller', null);
    $data[$sms . 'canceled_by_seller'] = \request($sms . 'canceled_by_seller', null);
    $data[$sms . 'active_out_of_stock'] = \request($sms . 'active_out_of_stock', null);
    $data[$sms . 'out_of_stock'] = \request($sms . 'out_of_stock', null);
    $data[$sms . 'active_refunded'] = \request($sms . 'active_refunded', null);
    $data[$sms . 'refunded'] = \request($sms . 'refunded', null);

    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Message Updated Successfully');
  }


  public function airShippingStore()
  {
    $shipping = request('shipping');
    $data['air_shipping_charges'] = json_encode($shipping);
    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Shipping Charges Updated Successfully');
  }


  public function cacheControl()
  {
    $files = Storage::files('browsing');
    $displayInfo = [];
    foreach ($files as $file) {
      $explode_file = explode('_', $file);
      if (count($explode_file) == 3) {

        $date = $explode_file[0];
        $date = str_replace('browsing/', '', $date);
        $name = $explode_file[1];

        $selectFile = true;
        if (in_array('fullInfo', $explode_file)) {
          if (strtotime($date) < strtotime(date('Y-m-d-H'))) {
            Storage::delete($file);
            $selectFile = false;
          }
        } else {
          if (strtotime($date) < strtotime(date('Y-m-d'))) {
            Storage::delete($file);
            $selectFile = false;
          }
        }
        if ($selectFile) {
          $displayInfo[] = [
            'date' => $date,
            'name' => $name,
            'size' => Storage::size($file),
            'file' => $file,
          ];
        }
      } else {
        Storage::delete($file);
      }
    }

    $displayInfo = collect($displayInfo)->sortByDesc('date');

    return view('backend.content.settings.cache-control', compact('displayInfo'));
  }

  public function cacheClear()
  {
    $clearType = \request('type');
    if (Storage::exists($clearType)) {
      Storage::delete($clearType);
      Cache::forget('settings'); // remove setting cache
      return redirect()->back()->withFlashWarning('Browsing Cache Remove Successfully');
    }
    return redirect()->back()->withFlashDanger('Cache Type Not Found');
  }

  public function threeColumnBanner()
  {
    return view('backend.content.settings.banner-right');
  }


  public function bannerRightStore()
  {
    $data = request()->only('left_banner_image_link', 'middle_banner_image_link', 'right_banner_image_link');

    $rightBanner = json_decode(get_setting('three_column_banners'));

    if (\request()->hasFile('left_banner_image')) {
      $data['left_banner_image'] = store_picture(\request()->file('left_banner_image'), 'setting/banner');
    } else {
      $data['left_banner_image'] = $rightBanner->top_image ?? null;
    }
    if (\request()->hasFile('middle_banner_image')) {
      $data['middle_banner_image'] = store_picture(\request()->file('middle_banner_image'), 'setting/banner');
    } else {
      $data['middle_banner_image'] = $rightBanner->top_image ?? null;
    }
    if (\request()->hasFile('right_banner_image')) {
      $data['right_banner_image'] = store_picture(\request()->file('right_banner_image'), 'setting/banner');
    } else {
      $data['right_banner_image'] = $rightBanner->top_image ?? null;
    }

    Setting::save_settings(['three_column_banners' => json_encode($data)]);

    return redirect()->back()->withFlashSuccess('Three column banner image set successfully');
  }


  public function topNoticeCreate()
  {
    return view('backend.content.settings.top-notice');
  }

  public function topNoticeStore()
  {
    $active = request('top_notice_text_active');
    $top_notice_text = request('top_notice_text');

    $data['top_notice_text_active'] = null;
    if ($active) {
      $data['top_notice_text_active'] = $active;
    }
    $data['top_notice_text'] = $top_notice_text;

    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Top Notice Updated  Successfully');
  }

  public function createImageLoader()
  {
    return view('backend.content.settings.image-loader-setting');
  }

  public function storeImageLoader()
  {
    $data = [];
    if (\request()->hasFile('banner_image_loader')) {
      $data['banner_image_loader'] = store_picture(\request()->file('banner_image_loader'), 'setting/loader');
    }

    if (\request()->hasFile('category_image_loader')) {
      $data['category_image_loader'] = store_picture(\request()->file('category_image_loader'), 'setting/loader');
    }

    if (\request()->hasFile('sub_category_image_loader')) {
      $data['sub_category_image_loader'] = store_picture(\request()->file('sub_category_image_loader'), 'setting/loader');
    }

    if (\request()->hasFile('product_image_loader')) {
      $data['product_image_loader'] = store_picture(\request()->file('product_image_loader'), 'setting/loader');
    }

    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Loading Image Store Successfully');
  }

  public function rightBannerStore()
  {
    $data = request()->only('banner_right_link1');
    if (\request()->hasFile('banner_right_1')) {
      $data['banner_right_1'] = store_picture(\request()->file('banner_right_1'), 'setting/banner');
    }

    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Right Banner Store Successfully');
  }


  public function shortMessageStore()
  {
    $data = \request()->only(['approx_weight_message', 'china_local_delivery_message', 'china_to_bd_bottom_message', 'china_to_bd_bottom_message_2nd', 'order_summary_bottom_message', 'payment_summary_bottom_message']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Short Message\'s Updated  Successfully');
  }



  public function blog()
  {
    return view('backend.content.settings.blog.index');
  }
  public function blogstore(Request $request)
  {


    if ($request->image) {
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = null;
    }
    if ($request->banner) {
      $banner = time() . 'banner' . '.' . $request->banner->extension();
      $image3 = $request->banner->move(public_path('setting/banner'), $banner);
    } else {
      $banner = null;
    }

    $event = new Blog;
    $event->banner_text = $request->banner_text;
    $event->image = $newImageName;
    $event->banner = $banner;
    $event->description = $request->description;

    $event->save();


    return redirect()->back()->withFlashSuccess('Sanad Store Successfully');
  }
  public function blogedit($id)
  {
    $notice = DB::table('blogs')->find($id);
    return view('backend.content.settings.blog.edit', compact('notice'));
  }
  public function blogupdate(Request $request)
  {
    $id = $request->notice_id;
    $blog = Blog::find($id);

    if ($request->image) {
      $photo_path = public_path('setting/banner/') . $blog->image;
      if (File::exists($photo_path)) {
        File::delete($photo_path);
      }
      $newImageName = time() . 'blog' . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $blog->image ?? null;
    }
    if ($request->banner) {
      if ($blog->banner != null) {
        $photo_path = public_path('setting/banner/') . $blog->banner;
        if (File::exists($photo_path)) {
          File::delete($photo_path);
        }
      }
      $banner = time() . 'banner' . '.' . $request->banner->extension();
      $image3 = $request->banner->move(public_path('setting/banner'), $banner);
    } else {
      $banner = $blog->banner ?? null;
    }
    $blog->banner_text = $request->banner_text;
    $blog->is_active = $request->is_active;
    $blog->image = $newImageName;
    $blog->banner = $banner ?? null;
    $blog->description = $request->description ?? $blog->description;

    $blog->save();

    return redirect('/admin/setting/blog')->withFlashSuccess('Sanad Updated Successfully');
  }



  public function service()
  {
    return view('backend.content.settings.service.index');
  }
  public function servicestore(Request $request)
  {

    foreach ($request->title  as $key => $title) {
      if ($request->image != null) {
        $newImageName = time() . '.' . $request->image[$key]->extension();
        $image = $request->image[$key]->move(public_path('setting/banner'), $newImageName);
      }
      $slider = new Service();
      $slider->service_image = $newImageName ?? null;
      $slider->title = $request->title[$key] ?? null;
      $slider->description = $request->description[$key] ?? null;
      $slider->service_title = $request->service_title[$key] ?? null;
      $slider->service_details = $request->service_details[$key] ?? null;
      $slider->homepage = $request->homepage[$key] ?? null;

      $slider->save();
    }

    return redirect()->back()->withFlashSuccess('Service Store Successfully');
  }
  public function serviceedit($id)
  {
    $notice = DB::table('services')->find($id);
    return view('backend.content.settings.service.edit', compact('notice'));
  }

  public function serviceupdate(Request $request)
  {
    $id = $request->notice_id;
    $slider = Service::find($id);
    if ($request->image) {
      $photo_path = public_path('setting/banner/') . $slider->image;
      if (File::exists($photo_path)) {
        File::delete($photo_path);
      }
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }

    $slider->title = $request->title ?? $slider->title;
    $slider->description = $request->description ?? $slider->description;
    $slider->service_image = $newImageName ?? $slider->service_image;
    $slider->service_title = $request->service_title ?? $slider->service_title;
    $slider->service_details = $request->service_details ?? $slider->service_details;
    $slider->homepage = $request->homepage ?? $slider->homepage;
    $slider->is_active = $request->is_active ?? $slider->is_active;
    $slider->save();
    return redirect('/admin/setting/service')->withFlashSuccess('Service Updated Successfully');;
  }

  public function project()
  {
    return view('backend.content.settings.project.index');
  }
  public function projectstore(Request $request)
  {

    foreach ($request->title  as $key => $title) {
      if ($request->image != null) {
        $newImageName = time() . '.' . $request->image[$key]->extension();
        $image = $request->image[$key]->move(public_path('setting/banner'), $newImageName);
      }
      $slider = new Project;
      $slider->image = $newImageName ?? null;
      $slider->header_title = $request->title[$key] ?? null;
      $slider->bottom_title = $request->bottom_title[$key] ?? null;
      $slider->details = $request->details[$key] ?? null;

      if ($request->hasFile('photos')) {
        $files = $request->file('photos');
        $i = 1;
        $photogalary = [];
        foreach ($files as $key => $file) {
          $service = time() . $i . '.'  . $file->extension();
          $photo = $file->move(public_path('setting/banner'), $service);
          $photogalary[] = $service;
          $i++;
        }
        $galary = json_encode($photogalary);
      }

      $slider->photos = $galary ?? null;
      $slider->save();
    }

    return redirect()->back()->withFlashSuccess('Project Store Successfully');
  }
  public function projectedit($id)
  {
    $notice = DB::table('services')->find($id);
    return view('backend.content.settings.project.edit', compact('notice'));
  }

  public function projectupdate(Request $request)
  {
    $id = $request->notice_id;
    $slider = Project::find($id);
    if ($request->image) {
      $photo_path = public_path('setting/banner/') . $slider->image;
      if (File::exists($photo_path)) {
        File::delete($photo_path);
      }
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }

    $slider->image = $newImageName ?? null;
    $slider->header_title = $request->header_title;
    $slider->bottom_title = $request->bottom_title;

    if ($request->details) {
      $slider->details = $request->details;
    } else {
      $slider->details = $slider->details;
    }

    $slider->is_active = $request->is_active;
    if ($request->hasFile('photos')) {
      $files = $request->file('photos');
      $i = 1;
      $photogalary = [];
      foreach ($files as $key => $file) {
        $service = time() . $i . '.'  . $file->extension();
        $photo = $file->move(public_path('setting/banner'), $service);
        $photogalary[] = $service;
        $i++;
      }
      $galary = json_encode($photogalary);
      $slider->photos = $galary ?? null;
    } else {
      $slider->photos = $slider->photos;
    }
    $slider->save();
    return redirect('/admin/setting/project')->withFlashSuccess('Project Updated Successfully');;
  }



  public function slider()
  {
    return view('backend.content.settings.slider.index');
  }
  public function sliderstore(Request $request)
  {
    foreach ($request->title  as $key => $title) {
      $newImageName = time() . '.' . $request->image[$key]->extension();
      $image = $request->image[$key]->move(public_path('setting/banner'), $newImageName);
      $slider = new Slider;
      $slider->image = $newImageName;
      $slider->header_title = $request->title[$key];
      $slider->bottom_title = $request->bottom_title[$key];
      $slider->save();
    }

    return redirect()->back()->withFlashSuccess('Notice Store Successfully');
  }
  public function slideredit($id)
  {
    $notice = DB::table('sliders')->find($id);
    return view('backend.content.settings.slider.edit', compact('notice'));
  }

  public function sliderupdate(Request $request)
  {
    $id = $request->notice_id;
    $slider = Slider::find($id);
    if ($request->image) {
      $photo_path = public_path('setting/banner/') . $slider->image;
      if (File::exists($photo_path)) {
        File::delete($photo_path);
      }
      $newImageName = time() . 'slider' . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $slider->image;
    }

    $slider->image = $newImageName;
    $slider->header_title = $request->header_title;
    $slider->bottom_title = $request->bottom_title;
    $slider->is_active = $request->is_active;
    $slider->save();
    return redirect('/admin/setting/slider')->withFlashSuccess('Slider Updated Successfully');;
  }

  // activity start
  public function activity()
  {

    return view('backend.content.settings.activity.index');
  }
  public function activitystore(Request $request)
  {
    if ($request->banner_image) {
      $newImageName = time() . '.' . $request->banner_image->extension();
      $image = $request->banner_image->move(public_path('setting/banner'), $newImageName);
    }

    $activity = new Activity;
    $activity->image = $newImageName;
    $activity->sort_para = $request->sort_para;
    $activity->title = $request->title;
    $activity->save();
    return redirect()->back()->withFlashSuccess('Activity Store Successfully');
  }

  public function activityedit($id)
  {
    $notice = Activity::find($id);
    return view('backend.content.settings.activity.edit', compact('notice'));
  }

  public function activityupdate(Request $request)
  {
    $id = $request->activity_id;
    $activity = Activity::find($id);
    if ($request->image) {
      $photo_path = public_path('setting/banner/') . $activity->image;
      if (File::exists($photo_path)) {
        File::delete($photo_path);
      }
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }


    $activity->image = $newImageName;
    $activity->sort_para = $request->sort_para;
    $activity->title = $request->title;
    $activity->is_active = $request->is_active;
    $activity->save();
    return redirect('/admin/setting/activity')->withFlashSuccess('Activity Updated Successfully');;
  }
  // activity end



  // brand start
  public function brand()
  {
    return view('backend.content.settings.brand.index');
  }
  public function brandstore(Request $request)
  {
    if ($request->banner_image) {
      $newImageName = time() . '.' . $request->banner_image->extension();
      $image = $request->banner_image->move(public_path('setting/banner'), $newImageName);
    }

    $brand = new Brand;
    $brand->logo = $newImageName;
    $brand->title = $request->title;
    $brand->save();

    return redirect()->back()->withFlashSuccess('Brand Store Successfully');
  }
  public function brandedit($id)
  {
    $notice = DB::table('brands')->find($id);
    return view('backend.content.settings.brand.edit', compact('notice'));
  }

  public function brandupdate(Request $request)
  {
    $id = $request->brand_id;
    $brand = Brand::find($id);
    if ($request->image) {
      $photo_path = public_path('setting/banner/') . $brand->image;
      if (File::exists($photo_path)) {
        File::delete($photo_path);
      }
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }
    $brand->logo = $newImageName;
    $brand->title = $request->title;
    $brand->is_active = $request->is_active;
    $brand->save();
    return redirect('/admin/setting/brand')->withFlashSuccess('Brand Updated Successfully');
  }
  // brand end


  public function techweb_important_links()
  {
    $imp_link = Link::orderBy('id', 'DESC')->get();
    return view('backend.content.right-bar.links.index', compact('imp_link'));
  }
  public function techweb_important_links_edit($id)
  {
    $link = Link::find($id);
    return view('backend.content.right-bar.links.edit', compact('link'));
  }
  public function techweb_important_links_delete($id)
  {
    $link = Link::find($id);
    $link->delete();
    return back()->withFlashSuccess('Link Deleted Successfully');
  }
  public function techweb_important_links_store(Request $request)
  {
    $link = new Link;
    $link->description = $request->description;
    $link->important_link = $request->important_link;
    $link->save();
    return back()->withFlashSuccess('Link Stored Successfully');
  }

  public function techweb_important_links_update(Request $request)
  {
    $link = Link::find($request->id);
    $link->description = $request->description;
    $link->important_link = $request->important_link;
    $link->save();
    return redirect('/admin/important-links')->withFlashSuccess('Link Updated Successfully');
  }

  public function techweb_important_forms()
  {
    $forms = Form::orderBy('id', 'DESC')->get();
    return view('backend.content.right-bar.forms.index', compact('forms'));
  }
  public function techweb_important_forms_edit($id)
  {
    $forms = Form::find($id);
    return view('backend.content.right-bar.forms.edit', compact('forms'));
  }
  public function techweb_important_forms_delete($id)
  {
    $forms = Form::find($id);
    $forms->delete();
    return back()->withFlashSuccess('Form Deleted Successfully');
  }
  public function techweb_important_forms_store(Request $request)
  {
    $forms = new Form;
    $forms->name = $request->name;

    if ($request->form) {
      $form = time() . 'form' . '.' . $request->form->extension();
      $image = $request->form->move(public_path('setting/form'), $form);
    }

    $forms->form = $form;
    $forms->save();
    return back()->withFlashSuccess('Form Stored Successfully');
  }

  public function techweb_important_forms_update(Request $request)
  {
    $forms = Form::find($request->id);
    $forms->name = $request->name;

    if ($request->form) {
      $photo_path = public_path('setting/form/') . $forms->form;
      if (File::exists($photo_path)) {
        File::delete($photo_path);
      }
      $form = time() . 'form'  . '.' . $request->form->extension();
      $image = $request->form->move(public_path('setting/form'), $form);
    }

    $forms->form = $form;
    $forms->save();
    return redirect('/admin/important-forms')->withFlashSuccess('Form Updated Successfully');
  }

  /**
   * method for render create certificate price.
   * @return array|object|string|bool
   */
  public function CertificatePrice(): array|object|string|bool
  {
    $certificate_pricing = CertificatePrice::query()->first();
    return view('backend.content.certificate-price.index', compact('certificate_pricing'));
  }

  /**
   * method for render store certificate price.
   * @return array|object|string|bool
   */
  public function CertificatePriceStore(Request $request): array|object|string|bool
  {
    $request->validate(['amount' => 'required']);
    $certificate_pricing = CertificatePrice::where('id', 1)->update(['price_rate' => $request->amount]);
    return back()->withFlashSuccess('Price Updated Successfully');
  }
}
