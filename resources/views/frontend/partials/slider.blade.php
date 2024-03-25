<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: 10px;">


    @php
        $sliders = DB::table('sliders')->get();
        $first = 'true';
    @endphp

     <div class="carousel-inner" role="listbox">
        @foreach ($sliders as $row)
          <div class="item {{ $first ? 'active':'' }}">

            <img class="first-slide" src="{{ asset($row->image) }}" alt="slide">

           </div>
            @php
              $first = false;
            @endphp
        @endforeach



      </div>

  </div>
