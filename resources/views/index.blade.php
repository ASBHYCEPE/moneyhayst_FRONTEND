<!DOCTYPE html>
<html>
    <head>
        <title>MONEYHAYST</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{asset('js/selection.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/home.css')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" id="dynamik-viewport"/>
    </head>
    <body>
        <div class="sidebar">
            <div class="logo">
                <h1>DASHBOARD</h1>
            </div>
            <div class="sidebar-content">
                <a href="/" class="sidebar-item">HOME</a>
                <a href="/income" class="sidebar-item">INCOME</a>
                <a href="/expense" class="sidebar-item">EXPENSE</a>
            </div>
        </div>
        <header>
            <h2>MONEYHAYST BUDGET AND EXPENSE TRACKER</h2>
        </header>

        <div class="main-content">
            <div class="content-block">
                <div class="content-item">
                    <div class="content-title">
                        <h4>INSERT TRANSACTION</h4>
                    </div>
                    <form id="main-form" action="/post" method="POST">
                        @csrf
                        <div class="form-block">
                            <div class="col-3">
                                <label class="form-label">TRANSACTION TYPE</label>
                            </div>
                            <div class="col-4">
                                <select name="transacType" id="transac-options" required>
                                    <Option value="" disabled selected>SELECT TRANSACTION</Option>
                                    <option value="0">INCOME</option>
                                    <option value="1">EXPENSE</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-block">
                            <div class="col-3">
                                <label class="form-label">CATEGORY</label>
                            </div>
                            <div class="col-4">
                                <select name="category" id="category" required>
                                    <Option value="" disabled selected>SELECT CATEGORY</Option>
                                </select>
                            </div>
                        </div>
                        <div class="form-block">
                            <div class="col-3">
                                <label class="form-label">TRANSACTION DATE</label>
                            </div>
                            <div class="col-4">
                               <input type="date" name="transacDate" id="transac-date" required>
                            </div>
                        </div>
                        <div class="form-block">
                            <div class="col-3">
                                <label class="form-label">TOTAL AMOUNT</label>
                            </div>
                            <div class="col-4">
                               <input type="number" name="totalAmount" id="total-amount" required>
                            </div>
                        </div>
                        <button type="submit">INSERT DETAILS</button>
                    </form>
                </div>
                <div class="content-item">
                    <div class="content-title">
                        <h4>SUMMARY DETAILS</h4>
                    </div>
                    <div id="summary-container">
                        <div class="display-item-amount">
                            <p id="amount-display">
                                ???{{$totalBalance}}
                            </p>
                            <p>TOTAL BALANCE</p>
                        </div>
                        <div class="summary-item-display">
                            <div id="display-item-income">
                                <p>INCOME: ???{{$totalIncome}}</p>
                            </div>
                            <div id="display-item-expense">
                                <p>EXPENSE: ???{{$totalExpense}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block">
                <div class="block-title">
                    <h2>RECENT TRANSACTIONS</h2>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Transaction Type</td>
                            <td>Category</td>
                            <td>Transaction Date</td>
                            <td>Total Amount</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transacData as $key => $data)
                            <tr>
                                <td>
                                    @if ($data->transac_type == '0')
                                        INCOME
                                    @else
                                        EXPENSE
                                    @endif
                                </td>
                                <td>{{$data->category}}</td>
                                <td>{{$data->transac_date}}</td>
                                <td>???{{$data->amount}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>