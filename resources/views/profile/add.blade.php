@extends('navigation.index')

@section('titre')
    Add Activity
@endsection
@section('content')
<div class="profile flex flex-row  h-full" >
    <nav class="bg-[#333] mt-[50px] w-[33%] hidden lg:block">
        <div class="sticky top-[50px]">
            <div class="user px-2 py-[80px] ">
                <div class="flex justify-center">
                    <img class="" src="{{ url("/storage/images/{$user->image->url}")}}" alt="image">
                </div>
                <h3 class="text-center text-white name">{{$user->firstname .' ' . $user->lastname}}</h3>
            </div>
            <div class="flex flex-col items-center justify-between ">
                <a class="w-[55%] text-center my-4 p-2 rounded-full shadow-md bg-[#111111] hover:bg-white hover:text-[#29D9D5] text-white font-semibold" href="">Home</a>
                <a class="w-[55%] text-center my-4 p-2 rounded-full shadow-md bg-[#111111] hover:bg-white hover:text-[#29D9D5] text-white font-semibold" href="">Activities</a>
                <a class="w-[55%]  text-center my-4 p-2 rounded-full shadow-md bg-[#111111] hover:bg-white hover:text-[#29D9D5] text-white font-semibold" href="">Informations</a>
            </div>
        </div>

    </nav>
    <div class=" mt-[50px] w-full">
        <div class="flex items-center justify-center pt-12">
            <form enctype="multipart/form-data" action="{{route('insertActivity')}}" method="POST" class="form p-2 bg-white rounded-xl w-[80%] md:w-[70%] " >
                @csrf
                <h1 class="text-center  p-2">new Activity</h1>
                @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif
                <div class="p-2 flex flex-row">
                    <label class=" w-[35%]" for="">Activity title </label>
                    <input class="border p-1 shadow-sm bg-[#CCC] w-[60%]" type="text" name="title">
                </div>
                <div class="p-2 flex flex-row">
                    <label class=" w-[35%]" for=""> City </label>
                    <input class="border p-1 shadow-sm bg-[#CCC] w-[60%]" type="text" name="city">
                </div>
                <div class="p-2 flex flex-row">
                    <label class="w-[35%]" for="">Category  </label>
                    <select class="border p-1 shadow-sm bg-[#CCC] w-[60%]" name="category_id" id="category">
                        <option value="" selected disabled>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-2 flex flex-row items-center">
                    <label class=" w-[35%]" for="image">Image</label>
                    <label id="upload" class="w-[60%] bg-[#CCC] flex flex-col rounded-lg border-2 border-solid h-60  group text-center">
                        <div id="uploadimg" class=" h-full w-full text-center flex flex-col items-center justify-center ">
                            <p class="pointer-none text-gray "><span id="blueSpan" class="text-blue-600 hover:underline">select Image</span> from your computer</p>
                        </div>
                        <img class="m-[5%] h-[90%] w-[90%] lg:h-[100%] lg:my-0 lg:w-[80%] lg:mx-[10%]" id="imageDisplay" alt="Upload Image" />
                        <input type="file"  id="image" name="image" accept="image/*" class="hidden">
                    </label>
                </div>
                <div class="p-2 flex flex-row items-center">
                    <label class="w-[35%] " for="">description</label>
                    <textarea class="border p-1 shadow-sm bg-[#CCC] w-[60%]" name="description" id="" cols="30" rows="3"></textarea>
                </div>
                <button type="submit" class="border-1 border-solid p-3 rounded-full ml-4 mt-4 bg-[#CCC] hover:bg-[#a29bfe] hover:text-white">Add Activity</button>
            </form>
        </div>
    </div>

</div>

