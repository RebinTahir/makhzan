<x-app-layout>

    <div class="py-12">
        <div id="tabs">
            <ul>
                <li> <a href="#operations"> {{ __('operations') }} </a></li>
                <li><a href="#products">  {{ __('products') }}</a>  </li>
            </ul>
            <div id="operations">
              
                  
                @php
                    $products = App\Models\Product::all();
                    
                @endphp
            
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('product') }}</th>
                                    <th>{{ __('karton') }}</th>
                                    <th>{{ __('darzan') }}</th>
                                    <th>{{ __('newdarzan') }}</th>
                                    <th>{{ __('dana') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td> {{ $item->name }} </td>
                                        <td>
                                            <div class="d-flex w-100">

                                                <p class="text-center w-50 text-danger">{{ $item->sellkarton }}</p>
                                                <p class="text-center w-50 text-success">{{ $item->buykarton }}</p>
                                                
                                            </div>
                                             
                                         
                                            <input type="text" value="0" class="form-control" id="karton"/>
                                            <button class="btn btn-danger"
                                                onclick="sellamount('karton','{{ $item->id }}');"> -
                                            </button>
                                            <button class="btn btn-primary"
                                            onclick="buyamount('karton','{{ $item->id }}');"> +
                                        </button>
                                        </td>
                                        <td>
                                           <div class="d-flex w-100">

                                               <p class="text-center w-50 text-danger">{{ $item->selldarzan }}</p>
                                               <p class="text-center w-50 text-success">{{ $item->buydarzan }}</p>
                                               
                                           </div>
                                            
                                            <input type="text" value="0" class="form-control" id="darzan"/>
                                            <button class="btn btn-danger"
                                                onclick="sellamount('darzan','{{ $item->id }}');"> -
                                            </button>
                                            <button class="btn btn-primary"
                                            onclick="buyamount('darzan','{{ $item->id }}');"> +
                                        </button>
                                        </td>
                                     
                                        <td> 
                                            <div class="d-flex w-100">

                                                <p class="text-center w-50 text-danger">{{ $item->sellnewdarzan }}</p>
                                                <p class="text-center w-50 text-success">{{ $item->buynewdarzan }}</p>
                                                
                                            </div>
                                             
                                            
                                            
                                            <input type="text" value="0" class="form-control" id="newdarzan"/>

                                            <button class="btn btn-danger"
                                                onclick="sellamount('newdarzan','{{ $item->id }}');"> -
                                            </button>
                                            <button class="btn btn-primary"
                                            onclick="buyamount('newdarzan','{{ $item->id }}');"> +
                                        </button>
                                        </td>
                                        <td> 
                                            <div class="d-flex w-100">

                                                <p class="text-center w-50 text-danger">{{ $item->selldana }}</p>
                                                <p class="text-center w-50 text-success">{{ $item->buydana }}</p>
                                                
                                            </div>
                                             
                                            
                                            <input type="text" value="0" class="form-control" id="dana"/>

                                            <button class="btn btn-danger"
                                                onclick="sellamount('dana','{{ $item->id }}');"> -
                                            </button>
                                            <button class="btn btn-primary"
                                            onclick="buyamount('dana','{{ $item->id }}');"> +
                                        </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                  

            </div>


        </div>

            <div id="products">
              <div class="row">
<div class="col-4">
    <div class="form-group">
        <label for="pname">{{ __('productname') }}</label>
        <input type="text" id="pname" class="form-control" minlength="1" maxlength="75" required />
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        <label for="sellkartonprice">{{ __('sellkartonprice') }}</label>
        <input type="text" id="sellkartonprice" class="form-control"  value="0"  />
    </div>
</div><div class="col-4">
    <div class="form-group">
        <label for="selldarzanprice">{{ __('selldarzanprice') }}</label>
        <input type="text" id="selldarzanprice" class="form-control" value="0" />
    </div>
</div><div class="col-4">
    <div class="form-group">
        <label for="sellnewdarzanprice">{{ __('sellnewdarzanprice') }}</label>
        <input type="text" id="sellnewdarzanprice" class="form-control" value="0" />
    </div>
</div><div class="col-4">
    <div class="form-group">
        <label for="selldanaprice">{{ __('selldanaprice') }}</label>
        <input type="text" id="selldanaprice" class="form-control" value="0" />
    </div>
</div>


<div class="col-4">
    <div class="form-group">
        <label for="pnote">{{ __('productnote') }}</label>
        <textarea id="pnote" class="form-control" minlength="0" maxlength="100"></textarea>
    </div>

</div> 




<div class="col-4">
    <div class="form-group">
        <button class="btn btn-success" onclick="saveproducts();">{{ __('save') }}</button>
    </div>
</div>

              </div>
{{-- we need to provide product update detail  --}}

              


            </div>
         

        </div>



    

    </div>
</x-app-layout>
