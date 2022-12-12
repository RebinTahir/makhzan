<x-app-layout>

    <div class="py-12">
        <div id="tabs">
            <ul>
                <li>{{ __('products') }}</li>
                <li>{{ __('operations') }}</li>
            </ul>
            <div id="products">
                <div class="form-group">
                    <label for="pname">{{__("productname")}}</label>
                    <input type="text" id="pname" class="form-control" minlength="1" maxlength="75" required/>
                </div>
                <div class="form-group">
                    <label for="pnote">{{__("productnote")}}</label>
                    <textarea  id="pnote" class="form-control" minlength="0" maxlength="100" ></textarea>
                </div>
<div class="form-group">
    <button class="btn btn-success">{{__("save")}}</button>
</div>


            </div>
            <div id="operations">
                <div class="tabs">
                    <ul>
                        <li>{{ __('pull') }}</li>
                        <li>{{ __('push') }}</li>

                    </ul>
                    @php
                        $products = App\Models\Product::all();
                        
                    @endphp
                    <div id="puller">


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('product') }}</th>
                                        <th>{{ __('karton') }}</th>
                                        <th>{{ __('darzan12') }}</th>
                                        <th>{{ __('darzan10') }}</th>
                                        <th>{{ __('newdarzan') }}</th>
                                        <th>{{ __('dana') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td> {{ $item->name }} </td>
                                            <td> {{ $item->sellkarton }}
                                                <button class="btn btn-primary" onclick="sellamount('karton','{{$item->id}}');"> -
                                                </button>
                                            </td>
                                            <td> {{ $item->selldarzan12 }}
                                                <button class="btn btn-primary" onclick="sellamount('darzan12','{{$item->id}}');"> -
                                                </button>
                                            </td>
                                            <td> {{ $item->selldarzan10 }}
                                                <button class="btn btn-primary" onclick="sellamount('darzan10','{{$item->id}}');"> -
                                                </button>
                                            </td>
                                            <td> {{ $item->sellnewdarzan }}
                                                <button class="btn btn-primary" onclick="sellamount('newdarzan','{{$item->id}}');"> -
                                                </button>
                                            </td>
                                            <td> {{ $item->selldana }}
                                                <button class="btn btn-primary" onclick="sellamount('dana','{{$item->id}}');"> -
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>


                    </div>
                    <div id="pusher">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('product') }}</th>
                                        <th>{{ __('karton') }}</th>
                                        <th>{{ __('darzan12') }}</th>
                                        <th>{{ __('darzan10') }}</th>
                                        <th>{{ __('newdarzan') }}</th>
                                        <th>{{ __('dana') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td> {{ $item->name }} </td>
                                            <td> {{ $item->sellkarton }}
                                                <button class="btn btn-primary" onclick="buyamount('karton','{{$item->id}}');"> -
                                                </button>
                                            </td>
                                            <td> {{ $item->selldarzan12 }}
                                                <button class="btn btn-primary" onclick="buyamount('darzan12','{{$item->id}}');"> -
                                                </button>
                                            </td>
                                            <td> {{ $item->selldarzan10 }}
                                                <button class="btn btn-primary" onclick="buyamount('darzan10','{{$item->id}}');"> -
                                                </button>
                                            </td>
                                            <td> {{ $item->sellnewdarzan }}
                                                <button class="btn btn-primary" onclick="buyamount('newdarzan','{{$item->id}}');"> -
                                                </button>
                                            </td>
                                            <td> {{ $item->selldana }}
                                                <button class="btn btn-primary" onclick="buyamount('dana','{{$item->id}}');"> -
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>


            </div>


        </div>



        {{--  we need to have the basic operation three tabs only product,warehouse(push,pull)  --}}


<script>
function sellamount(type,pid) {
$.post("{{route('product.sell')}}",{"pid":pid,"type":type}).done(()=>{
    alert("success");
}).fail(()=>{
    alert("fail");
});    
}
function buyamount(type,pid) {
$.post("{{route('product.buy')}}",{"pid":pid,"type":type}).done(()=>{
    alert("success");
}).fail(()=>{
    alert("fail");
});    
}
function saveproducts() {
let name = $("#pname").val();
let note = $("#pnote").val();
if(name.length <1 || name.length > 75){
    return ;
}
if(note.length  > 100){
    return ;
}


$.post("{{route('product.insert')}}",{"name":name,"note":note}).done(()=>{
    alert("success");
}).fail(()=>{
    alert("fail");
});    

}




</script>


    </div>
</x-app-layout>
