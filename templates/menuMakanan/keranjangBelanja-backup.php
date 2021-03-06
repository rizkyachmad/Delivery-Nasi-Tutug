@extends('skeleton')

<?php 
    use ROH\Util\Inflector;
    use App\Library\Pagination;
 ?>

<?php
$schema = array();
foreach (f('controller')->schema() as $key => $field) {
    if ($field['list-column']) {
        $schema[$key] = $field;
    }
}
?>

@section('pagetitle')
   {{ Inflector::pluralize(Inflector::humanize(f('controller')->getClass())) }}
@stop


@section('tabssearch')
@stop

@section('menu')
@stop

@section('content')
        
    <div class="wrapper">
        <h4 class="sub-title" style=" padding-bottom: 12px; color: #F95C5C; font-weight: 500; line-height: 126%; border-bottom: 1px solid #c6d5e7; font-size: 14px;"> <i class="xn xn-basket"></i> Keranjang Belanja</h4>
    </div>

    <div class="wrapper">
        <div class="row">
            
            <form method="get">

            <ul>

            <!-- <form method="post" action="{{ f('controller.url', '/null/isiForm') }}"> -->

                <?php $totalBelanja = 0; ?> 

                @foreach ($readMakanan as $key => $value) 

                    <li>
                        {{ $value['nama'] }} || {{ $value['harga'] }}
                    </li>

                    <!-- //* total belanja -->
                    <?php $totalBelanja += $value['harga']; ?>

                @endforeach <br /> 
                    
                    Banyak Beli|| <br />

                    @foreach ($keranjang as $key => $v)
                         {{ $v['qty'] }} ||
                    @endforeach <br />

                    <!-- Ongkos kirim <br />
                    || {{ number_format($ongkos['ongkos']) }}  -->

                    <br />



                <!-- //-- banyak nya makanan --\\  -->
                Total Belanja || {{ number_format($totalKeranjang) }}
                Total Belanja || {{ number_format($totalKeselurahan) }}

            </ul>
        </div>
    </div>

            <center>
                <a href="{{ f('controller.url') }}" class="badge">Lanjutkan Belanja</a>
                <!-- selesai belanja, sementara null -->
                    <!-- <input type="hidden" value="1" name="kirim"> -->
                    <a href="{{ f('controller.url', '/' .number_format($totalKeselurahan). '/' .number_format($ongkos['ongkos']). '/' .number_format($totalKeranjang). '/' .$totalKeselurahanUser. '/jumlahKeseluruhan') }}" class="badge popup"> Selesai Belanja </a> 
                    <!-- <a href="{{ f('controller.url', '/' .number_format($totalKeselurahan).'/jumlahKeseluruhan') }}" class="badge popup"> Selesai Belanja </a>  -->
                <!-- </form> -->
            </center>

        <!-- </form> -->

    
@stop


