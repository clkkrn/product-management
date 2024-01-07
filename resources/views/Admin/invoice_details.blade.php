@extends('layouts.admin_master')

@section('content')
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>A simple, clean, and responsive HTML invoice template</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.rtl table {
				text-align: right;
			}

			.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<h2>Blue Tree Cafe</h2>
								</td>

								<td>
									Fatura #: {{$data->id }}<br />
									{{$data->created_at }}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
                                    Blue Tree Cafe.<br />
									Buca<br />
									İzmir
								</td>

								<td>
									{{ $data->company }}<br />
									{{ $data->customer_name }}<br />
									{{ $data->customer_mail }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Detaylar</td>

					<td>#</td>
				</tr>

				<tr class="item">
					<td>Alt Ürün İsmi</td>
					<td>{{ $data->product_name }}</td>
				</tr>
				<tr class="item">
					<td>Alt Ürün Miktar</td>
					<td>{{ $data->quantity }}</td>
				</tr>
				<tr class="item">
					<td>Birim Fiyat</td>
					<td>{{ $data->price }}</td>
				</tr>
				<tr class="item">
					<td>Toplam Fiyat</td>
					<td>{{ $data->total }}</td>
				</tr>
				<tr class="item">
					<td>Ödeme</td>
					<td>{{ $data->payment }}</td>
				</tr>
				<tr class="item">
					<td>Kalan Ödeme</td>
					<td>{{ $data->due }}</td>
				</tr>


				<!-- <tr class="item last">
					<td>Durum</td>

					<td>Product on Delivery</td>
				</tr> -->

				<tr class="total">
					<td></td>

                    <td><input style="padding:5px;" value="Faturayı Yazdır" type="button" onclick="myFunction()" class="button"></input></td>
				</tr>
			</table>
		</div>

@section('script')
<script>
function myFunction()
{
    window.print();
}

</script>
@endsection

	</body>
</html>


@endsection
@section('script')
