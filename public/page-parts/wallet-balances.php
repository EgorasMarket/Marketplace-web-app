<div class="bg-white products-spec">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Assets</th>
                <th scope="col">Balance</th>
                <th scope="col">Send</th>
                <th scope="col">Unlock</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">
                    <span class="font-weight-bold">EUSD</span><br>
                    <span>USD</span>
                </td>
                <td class="text-center">
                    <span class="font-weight-bold accountBalanceGor">0.000</span><br>
                    <span>&#36;<span class="accountBalanceGor">0.00</span></span> </td>
                <td class="text-center">
                    <button type="button" id="GOR" onclick="initiateSend(this.id)" class="btn btn-light"><i class="fas fa-share"></i></button>
                </td>
                <td class="text-center">
                    <!-- <div class="switchToggle">
                        <input type="checkbox" id="switch1">
                        <label for="switch1">Toggle</label>
                    </div> -->

                    <button id="openApproveModal" data-toggle="modal" data-target="#approveModal" class="btn btn-warning"><i class="fa fa-unlock" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">
                    <span class="font-weight-bold ">EGR</span><br>
                    <!-- <span>USD</span> -->
                </td>
                <td class="text-center">
                    <span class="font-weight-bold accountBalanceEgr">0.000</span><br>
                    <!-- <span>&#36;0.00</span> -->
                </td>
                <td class="text-center">
                    <button type="button" id="EGR" onclick="initiateSend(this.id)" class="btn btn-light"><i class="fas fa-share"></i></button>
                </td>
                <td class="text-center">
                    <!-- <div class="switchToggle">
                        <input type="checkbox" id="switch2">
                        <label for="switch2">Toggle</label>
                    </div> -->
                </td>
            </tr>

            <tr>
                <td class="text-center">
                    <span class="font-weight-bold ">ETH</span><br>

                </td>
                <td class="text-center">
                    <span class="font-weight-bold accountBalanceEth">0.000</span><br>
                    <!-- <span>&#36;0.00</span> -->
                </td>
                <td class="text-center">
                    <button type="button" id="ETH" onclick="initiateSend(this.id)" class="btn btn-light"><i class="fas fa-share"></i></button>
                </td>
                <td class="text-center">
                    <!-- <div class="switchToggle">
                        <input type="checkbox" id="switch2">
                        <label for="switch2">Toggle</label>
                    </div> -->
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div>
    <div class="text-center">
        <p class="text-center"><button type="button" class="btn btn-light btn-round">INSTANT PAYOUT</button></p>
        <h2 class="incentiveFomChains"> 0.00</h2>
        <p>Incentives</p>
        <button type="button" onclick="App.incentifyUser()" class="btn btn-orange mb-2">Claim</button>
    </div>
</div>