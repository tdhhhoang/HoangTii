 @extends('admin_layout')
 @section('admin_content') 

 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Sản Phẩm
                        </header>
                        <div class="panel-body">
                            <?php
                              $message=Session::get('message');
                              if($message)
                              {
                                 echo $message;
                                 Session::put('message',null);
                              }
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Giá Sản Phẩm">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh Sản Phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
                                    <textarea style="resize: none" rows="5" name="product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Nội Dung Sản Phẩm</label>
                                    <textarea style="resize: none" rows="5" name="product_content" class="form-control" id="exampleInputPassword1" placeholder="Mô tả nội dung sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh Mục Sản Phẩm</label>
                                         <select name="product_cate" class="form-control input-sm m-bot15">
                                                @foreach($cate_product as $key => $cate)
                                                 <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                @endforeach
                                                
                                         </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương Hiệu Sản Phẩm</label>
                                         <select name="product_brand" class="form-control input-sm m-bot15">
                                                @foreach($brand_product as $key => $brand)
                                                 <option value="{{$brand->brand_id}}"> {{$brand->brand_name}}</option>
                                                 @endforeach
                                                
                                         </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển Thị</label>
                                         <select name="product_status" class="form-control input-sm m-bot15">
                                                 <option value="0"> Hiển Thị</option>
                                                 <option value="1">Ẩn</option>
                                                
                                         </select>
                                </div>
                                
                                <button type="submit" name="add_product" onclick="return confirm('Bạn có muốn thêm  ?')" class="btn btn-info">Thêm Sản Phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>

@endsection