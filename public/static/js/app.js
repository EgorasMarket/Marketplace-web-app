App = {
  web3Provider: null,
  contracts: {},
  account: 0x0,
  etherscan: "https://etherscan.io/tx/",
  init: function (reload) {

    return App.initWeb3(reload);
  },

  initWeb3: function (reload) {
    if (getCookie("login-type") == "Metamask") {
      if (typeof web3 !== "undefined") {
        // Use Mist/MetaMask's provider.
        App.web3Provider = web3.currentProvider;
      } else {
        // Handle the case where the user doesn't have web3. Probably
        // show them a message telling them to install Metamask in
        // order to use the app.
      }
    } else if (getCookie("login-type") == "Fortmatic") {
      let fm = new Fortmatic("pk_test_6F130F20E3DCBF60");
      App.web3Provider = fm.getProvider();
    }
    web3 = new Web3(App.web3Provider);
    web3.currentProvider
      .enable()
      .then(function (accounts) {
        web3.eth.getCoinbase((error, coinbase) => {
          if (error) throw error;
          setCookie("walletId", coinbase, 2);
          App.account = coinbase;


        });
        App.initContract();
        if (reload) {

          setTimeout(function () {

            location.reload();
            if ($("#connectWalletModal").hasClass("show")) {
              $("#connectWalletModalbtn").trigger("click");
              $("#loginBtns").show();
              $("#spinnerLoader").hide();

            }
          }, 1000);
        }
      })
      .catch(function (reason) {
        // Handle error. Likely the user rejected the login:
        console.log(reason === "User rejected provider access");
      });



  },

  initContract: function () {

    $.getJSON('/public/static/json/EgorasMarket.json?v=0.0.4', function (egorasMarketArtifact) {
      App.contracts.EgorasMarket = new web3.eth.Contract(egorasMarketArtifact.abi, egorasMarketArtifact.contractAddress);
      App.contracts.EgorasMarket.setProvider(App.web3Provider);
    });

    $.getJSON('/public/static/json/GenericAbi.json?v=0.0.4', function (GenericArtifact) {
      App.contracts.EgorasEUSD = new web3.eth.Contract(GenericArtifact.abi, GenericArtifact.egorasEUSDAddress);
      App.contracts.EgorasEUSD.setProvider(App.web3Provider);

      App.contracts.EgorasCoin = new web3.eth.Contract(GenericArtifact.abi, GenericArtifact.egoCoinAddress);
      App.contracts.EgorasCoin.setProvider(App.web3Provider);
    });

    $.getJSON('/public/static/json/Vault.json?v=0.0.4', function (egorasVaultArtifact) {
      App.contracts.EgorasVault = new web3.eth.Contract(egorasVaultArtifact.abi, egorasVaultArtifact.contractAddress);
      App.contracts.EgorasVault.setProvider(App.web3Provider);
    });

  },

  getNextClaimDate: function () {
    App.contracts.EgorasMarket.methods.getNextClaimDate().call(function (error, result) {
      console.log(error + "The Error", result + "The result")
    });
  },
  GenerateCoin: function () {

    switch (selected) {
      case "eusd":
        App.generateEGR();
        break;
      case "egr":
        App.generateEUSD();
        break;
      default:
        break;
    }
  },
  generateEUSD: function () {
    var input = parseFloat($("#VaultInput").val());
    App.showModal();
    if (input > 0) {
      App.contracts.EgorasCoin.methods.allowance(App.account, App.contracts.EgorasVault._address).call(function (error, allowance) {
        if (parseFloat(allowance) >= web3.utils.toWei(input.toString())) {
          App.contracts.EgorasVault.methods.generateEgorasEUSD(web3.utils.toWei(input.toString())).send({
            from: App.account
          })
            .on('transactionHash', function (hash) {
              if (hash !== null) {
                var msg = '<p>Transaction completed successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>.</p>';
                App.alerterSuccesss(msg);
                // $("#openApproveVaultModal").trigger("click");
              }

            }).on('error', function (err) {
              var text = '<p>Did not complete successfully </p>';
              App.alerterDanger(text);

            })
        } else {
          // increase allowance
          var text = '<p>Before you can generate EGR, you need to approve the vault to spend on behalf of you. <br><b><button id="' + selected + '" class="btn btn-warning" onclick="approveVaultBtnTrigger(this.id)">Approve Now</button></b></p>';
          App.alerterWarning(text);
        }
      });
    } else {
      var text = '<p>Please enter a valid amount </p>';
      App.alerterDanger(text);
    }


  },
  generateEGR: function () {
    var input = parseFloat($("#VaultInput").val());
    App.showModal();
    if (input > 0) {
      App.contracts.EgorasEUSD.methods.allowance(App.account, App.contracts.EgorasVault._address).call(function (error, allowance) {
        if (parseFloat(allowance) >= web3.utils.toWei(input.toString())) {
          App.contracts.EgorasVault.methods.generateEgorasCoin(web3.utils.toWei(input.toString())).send({
            from: App.account
          })
            .on('transactionHash', function (hash) {
              if (hash !== null) {

                var msg = '<p>Transaction completed successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>.</p>';
                App.alerterSuccesss(msg);
                // $("#openApproveVaultModal").trigger("click");
              }


            }).on('error', function (err) {
              var text = '<p>Did not complete successfully </p>';
              App.alerterDanger(text);

            })
        } else {
          // increase allowance
          var text = '<p>Before you can generate EGR, you need to approve the vault to spend on behalf of you. <br><b><button id="' + selected + '" class="btn btn-warning" onclick="approveVaultBtnTrigger(this.id)">Approve Now</button></b></p>';
          App.alerterWarning(text);
        }
      });
    } else {
      var text = '<p>Please enter a valid amount </p>';
      App.alerterDanger(text);
    }

  },
  unlockToken: function (token_id) {
    App.showModal();
    App.contracts.EgorasMarket.methods.unlockToken(token_id).send({
      from: App.account
    })
      .on('transactionHash', function (hash) {
        if (hash !== null) {

          $.get("/sell_now/partialRelease/" + token_id, function (data, status) {
            var text = '<p>Transaction completed successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>. Your product will be available to whole world in few hours/minutes </p>';
            App.alerterSuccesss(text);
            setTimeout(function () {
              location.replace("/orders");
            }, 5000);

          });


        }

      }).on('error', function (err) {
        console.log(err, "The errow message");
        var text = '<p>Did not complete successfully </p>';
        App.alerterDanger(text);
      })
  },
  addBuyOrder: function (id) {
    App.showModal();
    $.getJSON('/phones/getGadgetBy/' + id, {

    }, function (data, textStatus, jqXHR) {

      if (data) {
        let rs = JSON.parse(data);
        let buyPrice = web3.utils.toWei(parseFloat(rs.price).toString());
        App.contracts.EgorasEUSD.methods.balanceOf(App.account).call(function (error, balance) {


          if (parseFloat(balance) >= buyPrice) {
            App.contracts.EgorasEUSD.methods.allowance(App.account, App.contracts.EgorasMarket._address).call(function (error, allowance) {

              if (parseFloat(allowance) >= buyPrice) {
                if (rs.is_added == 0) {
                  App.contracts.EgorasMarket.methods.addBuyOrder(rs.id, rs.brand + " " + rs.model, buyPrice).send({
                    from: App.account
                  })
                    .on('transactionHash', function (hash) {
                      if (hash !== null) {

                        $.get("/sell_now/partialBuy/" + rs.id, function (data, status) {
                          var text = '<p>Transaction completed successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>. Your product will be available to whole world in few hours/minutes </p>';
                          App.alerterSuccesss(text);
                          var wait = '<div class="alert alert-warning" role="alert">Awaiting confirmation</div>';
                          $("#btn-wrapper" + rs.id).html(wait)

                        });


                      }

                    }).on('error', function (err) {
                      console.log(err, "The errow message");
                      var text = '<p>Did not complete successfully </p>';
                      App.alerterDanger(text);
                    })


                } else {
                  //token already added
                }
              } else {
                // increase allowance
                var text = '<p>Before you can list your product, you need to approve this app to spend on behalf of you. <br><b><button class="btn btn-warning" onclick="approveBtnTrigger()">Approve Now</button></b></p>';
                App.alerterWarning(text);
              }

            });

          } else {
            // insuficient balance
            var text = '<p>Insufficient balance! Please buy Egoras EUSD at <b><a target="_blank" href="https://google.com">EtherFlyer</a></b></p>';
            App.alerterDanger(text);
          }
        });


      } else {

      }

    });



  },
  approveVaultApp: function () {
    App.showModal();
    let instance;
    let coinName;
    if (isNaN($("#approvalVaultAmount").val()) == false && parseFloat($("#approvalVaultAmount").val()) > 0) {
      let approvalVaultAmount = web3.utils.toWei(parseFloat($("#approvalVaultAmount").val()).toString());
      if ($("#whichCoin").val() == "eusd") {
        instance = App.contracts.EgorasEUSD;
        coinName = "Egoras EUSD";
      } else {
        instance = App.contracts.EgorasCoin;
        coinName = "Egoras Coin";
      }
      instance.methods.balanceOf(App.account).call(function (error, balance) {


        if (parseFloat(balance) >= approvalVaultAmount && approvalVaultAmount > 0) {

          instance.methods.approve(App.contracts.EgorasVault._address, approvalVaultAmount).send({
            from: App.account
          })
            .on('transactionHash', function (hash) {
              if (hash !== null) {
                var msg = '<p>Transaction completed successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>.</p>';
                App.alerterSuccesss(msg);
                $("#openApproveVaultModal").trigger("click");
              }

            }).on('error', function (err) {
              var text = '<p>Did not complete successfully </p>';
              App.alerterDanger(text);

            })


        } else {
          // insuficient balance
          var text = '<p>Insufficient balance! Please buy <b>more</b> ' + coinName + ' at <b><a target="_blank" href="https://google.com">EtherFlyer</a></b></p>';
          App.alerterDanger(text);
        }
      });

    } else {
      var text = '<p>You have entered invalid amount</p>';
      App.alerterDanger(text);
    }
  },
  approveApp: function () {
    App.showModal();
    if (isNaN($("#approvalAmount").val()) == false && parseFloat($("#approvalAmount").val()) > 0) {


      let approveAmount = web3.utils.toWei(parseFloat($("#approvalAmount").val()).toString());
      App.contracts.EgorasEUSD.methods.balanceOf(App.account).call(function (error, balance) {


        if (parseFloat(balance) >= approveAmount && approveAmount > 0) {

          App.contracts.EgorasEUSD.methods.approve(App.contracts.EgorasMarket._address, approveAmount).send({
            from: App.account
          })
            .on('transactionHash', function (hash) {
              if (hash !== null) {
                var msg = '<p>Transaction completed successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>.</p>';
                App.alerterSuccesss(msg);
                $("#openApproveModal").trigger("click");
              }
            }).on('error', function (err) {
              var text = '<p>Did not complete successfully </p>';
              App.alerterDanger(text);

            })


        } else {
          // insuficient balance
          var text = '<p>Insufficient balance! Please buy <b>more</b> Egoras EUSD at <b><a target="_blank" href="https://google.com">EtherFlyer</a></b></p>';
          App.alerterDanger(text);
        }
      });
    } else {
      var text = '<p>You have entered invalid amount</p>';
      App.alerterDanger(text);
    }
  },
  displayAccountInfo: function () {


    try {
      web3.eth.getBalance(App.account, function (err, balance) {
        if (err === null) {
          let ether = parseFloat(web3.utils.fromWei(balance, "ether"));
          $('.accountBalanceEth').text(ether.toFixed(2));
        }
      });
    } catch (error) {
      console.log(error);

    }


    try {
      App.contracts.EgorasEUSD.methods.balanceOf(App.account).call(function (error, balance) {
        $('.accountBalanceGor').text(formatNumber(web3.utils.fromWei(balance, "ether")));
      });
    } catch (error) {
      console.log(error);

    }

    try {
      App.contracts.EgorasEUSD.methods.totalSupply().call(function (error, totalSupply) {
        // console.log(totalSupply);
        localStorage.setItem("totalSupply", web3.utils.fromWei(totalSupply, "ether"))
        $('.eusdTotalSupply').text(formatNumber(web3.utils.fromWei(totalSupply, "ether")));
      });
    } catch (error) {
      console.log(error);

    }

    try {
      App.contracts.EgorasCoin.methods.balanceOf(App.account).call(function (error, balance) {
        $('.accountBalanceEgr').text(formatNumber(web3.utils.fromWei(balance, "ether")));
      });
    } catch (error) {
      console.log(error);

    }

    try {
      App.contracts.EgorasCoin.methods.balanceOf(App.contracts.EgorasVault._address).call(function (error, balance) {
        $('.egrInVault').text(formatNumber(web3.utils.fromWei(balance, "ether")));
        localStorage.setItem("EgorasVaultBalance", web3.utils.fromWei(balance, "ether"))
      });
    } catch (error) {
      console.log(error);

    }

    try {
      App.contracts.EgorasVault.methods.getPrice().call(function (error, price) {
        $('.egrVaultPrice').text((web3.utils.fromWei(price, "ether")));
        localStorage.setItem("egrVaultPrice", web3.utils.fromWei(price, "ether"))


      });
    } catch (error) {
      console.log(error);

    }


    try {
      App.contracts.EgorasMarket.methods.userIncentive(App.account).call(function (error, _marketShare) {

        console.log(error, _marketShare, App.account);

        if (parseFloat(_marketShare) > 0 && parseFloat(_marketShare) < 10000) {
          $('.incentiveFomChains').text(formatNumber(web3.utils.fromWei(_marketShare, "ether")) + " EGR");
        }
      });
    } catch (error) {
      console.log(error);

    }


  },
  cancelBuyOrder: function (id) {
    App.showModal();
    $.getJSON('/phones/getGadgetBy/' + id, {

    }, function (data, textStatus, jqXHR) {

      if (data) {
        let rs = JSON.parse(data);


        if (rs.is_added == 0) {
          array_id = {
            "main_id": id
          }
          $.ajax({
            url: "/cancel_listing/",
            type: "POST",
            data: array_id,



            success: function (response) {
              var data = JSON.parse(response);
              if (data.error) {
                var error = data.error.msg;
              } else if (data.success) {
                var error = data.success.msg;
                $('#hiderow' + id).slideUp();
                App.alerterSuccesss("<p>Deleted successfully <br></p>");
              }

            },
            error: function (e) {

            }
          });
        } else if (rs.is_added == 1) {

          App.contracts.EgorasMarket.methods.ownerOf(rs.tokon_id).call(function (error, _owner) {
            if (!error) {
              if (_owner.toLowerCase() == App.account.toLowerCase()) {
                App.contracts.EgorasMarket.methods.isTokenLocked(rs.tokon_id).call(function (error, isLock) {

                  if (!error) {
                    if (!isLock) {
                      App.contracts.EgorasMarket.methods.cancelBuyOrder(rs.tokon_id).send({
                        from: App.account
                      })
                        .on('transactionHash', function (hash) {
                          if (hash !== null) {
                            var text = '<p>Cancelled successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>. Your product will no longer be available to whole world in few hours/minutes </p>';
                            App.alerterSuccesss(text);
                          }
                        }).on('error', function (err) {
                          console.log(err, "The errow message");
                          var text = '<p>Did not complete successfully </p>';
                          App.alerterDanger(text);
                        })
                    } else {
                      var text = "<p>You can't cancel the buyer because another user has choosing to sell to you</p>";
                      App.alerterDanger(text)
                    }
                  }
                });
              } else {
                var text = "Invalid token owner";
                App.alerterDanger(text)
              }
            } else {
              var text = "Invalid token owner";
              App.alerterDanger(text)
            }

          });
        }



      } else {

      }

    });
  },
  alerterSuccesss: function (msg) {
    var fas = '<div class="alert alert-success" role="alert"><h1 class="text-success"> <i class="fa fa-check-circle fa-2x" aria-hidden="true"></i></h1>';
    var text = msg + '</div>';
    $("#loaderDiv").hide()
    $("#rsInfo").html(fas + text);
    $("#rsInfo").show();
  },
  alerterDanger: function (msg) {
    var fas = '<div class="alert alert-danger" role="alert"><h1 class="text-danger"> <i class="fas fa-times fa-2x"></i></h1>';
    var text = msg + '</div>';
    $("#loaderDiv").hide()
    $("#rsInfo").html(fas + text);
    $("#rsInfo").show();
  },
  alerterWarning: function (msg) {
    var fas = '<div class="alert alert-warning" role="alert"><h1 class="text-warning"> <i class="fas fa-info-circle fa-2x"></i></h1>';
    var text = msg + '</div>';
    $("#loaderDiv").hide()
    $("#rsInfo").html(fas + text);
    $("#rsInfo").show();
  },
  sendOutToken: function () {
    App.showModal();
    $("#sendTokenBtn").trigger("click");
    let amount = $("#sendTokenAmount").val();
    let address = $("#sendTokenAddress").val();
    let which = $("#sendTokenWhich").val();

    if (which == "ETH") {
      web3.eth.sendTransaction({
        from: App.account,
        to: address,
        value: web3.utils.toWei(amount)
      })
        .on('transactionHash', function (hash) {
          if (hash !== null) {
            var text = '<p>Transfer completed successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>. </p>';
            App.alerterSuccesss(text);
          }
        }).on('error', function (err) {
          var text = '<p>Did not complete successfully </p>';
          App.alerterDanger(text);

        })
    } else if (which == "GOR") {
      App.contracts.EgorasEUSD.methods.transfer(address, web3.utils.toWei(amount)).send({
        from: App.account
      })
        .on('transactionHash', function (hash) {
          if (hash !== null) {
            var text = '<p>Transfer completed successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>. </p>';
            App.alerterSuccesss(text);
          }
        }).on('error', function (err) {
          var text = '<p>Did not complete successfully </p>';
          App.alerterDanger(text);

        })
    } else if (which == "EGR") {
      App.contracts.EgorasCoin.methods.transfer(address, web3.utils.toWei(amount)).send({
        from: App.account
      })
        .on('transactionHash', function (hash) {
          if (hash !== null) {
            var text = '<p>Transfer completed successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>. </p>';
            App.alerterSuccesss(text);
          }
        }).on('error', function (err) {
          var text = '<p>Did not complete successfully </p>';
          App.alerterDanger(text);

        })
    }
  },
  initiateDispute: function (params) {
    App.showModal();

    array_id = {
      "slug": params
    }
    $.ajax({
      url: "/cancel_listing/initiate_dispute",
      type: "POST",
      data: array_id,



      success: function (response) {
        console.log(response);

        var data = JSON.parse(response);
        if (data.error) {
          var error = data.error.msg;
        } else if (data.success) {
          var error = data.success.msg;

          App.alerterSuccesss("<p>Deleted successfully <br></p>");
        }

      },
      error: function (e) {
        console.log(e);
      }
    });
  },
  showModal: function () {
    $("#rsInfo").hide();
    $("#loaderDiv").show();

    $("#txtModal").addClass("show");
  },
  lock: function () {
    App.showModal();
    let rs = JSON.parse(JSON.parse((localStorage.getItem('phoneObject'))));
    App.contracts.EgorasMarket.methods.isTokenLocked(rs.tokon_id).call(function (error, isLock) {

      if (!error && isLock == false) {




        App.contracts.EgorasMarket.methods.sellTo(rs.tokon_id).send({
          from: App.account
        })
          .on('transactionHash', function (hash) {
            if (hash !== null) {
              $.get("/sell_now/lockToken/" + rs.tokon_id, function (data, status) {
                var text = '<p>Sell completed successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>. send the item to the custodian before your fund will be released.</p>';
                App.alerterSuccesss(text);

                $(document).ready(function () {
                  setTimeout(function () {
                    window.location.href = "/orders/"
                  }, 3000);
                });
              });
            }
          }).on('error', function (err) {
            var text = '<p>Did not complete successfully </p>';
            App.alerterDanger(text);

          })
      } else {
        // the token is locked
        var text = '<p>The item is out of stock!</p>';
        App.alerterDanger(text);
      }
    });
  },
  settleDispute: function (id) {
    App.showModal();

    App.contracts.EgorasMarket.methods.isTokenLocked(id).call(function (error, isLock) {


      if (!error && isLock == true) {
        App.contracts.EgorasMarket.methods.settleDispute(id).send({
          from: App.account
        })
          .on('transactionHash', function (hash) {
            if (hash !== null) {
              $.get("/sell_now/finalize/" + id, function (data, status) {
                var text = '<p>Fund released successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>. Thank you for using egoras.</p>';
                App.alerterSuccesss(text);

                $(document).ready(function () {
                  setTimeout(function () {
                    window.location.href = "/orders/"
                  }, 5000);
                });
              });
            }
          }).on('error', function (err) {
            var text = '<p>Did not complete successfully </p>';
            App.alerterDanger(text);

          })
      } else {
        // the token is locked
        var text = '<p>Unknown error has occurred please contact support immediately!</p>';
        App.alerterDanger(text);
      }
    });
  },
  releaseFund: function (id) {
    App.showModal();

    App.contracts.EgorasMarket.methods.isTokenLocked(id).call(function (error, isLock) {


      if (!error && isLock == true) {
        App.contracts.EgorasMarket.methods.finalizeBuyOrder(id).send({
          from: App.account
        })
          .on('transactionHash', function (hash) {
            if (hash !== null) {
              $.get("/sell_now/finalize/" + id, function (data, status) {
                var text = '<p>Fund released successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>. Thank you for using egoras.</p>';
                App.alerterSuccesss(text);

                $(document).ready(function () {
                  setTimeout(function () {
                    window.location.href = "/orders/"
                  }, 5000);
                });
              });
            }
          }).on('error', function (err) {
            var text = '<p>Did not complete successfully </p>';
            App.alerterDanger(text);

          })
      } else {
        // the token is locked
        var text = '<p>Unknown error has occurred please contact support immediately!</p>';
        App.alerterDanger(text);
      }
    });
  },
  incentifyUser: function () {
    App.showModal();

    App.contracts.EgorasMarket.methods.claimable().call(function (error, claimable) {


      if (!error && claimable == true) {
        App.contracts.EgorasMarket.methods.incentifyCustdians().send({
          from: App.account
        })
          .on('transactionHash', function (hash) {
            if (hash !== null) {
              var text = '<p>Fund released successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>. Thank you for using egoras.</p>';
              App.alerterSuccesss(text);
            }

          }).on('error', function (err) {
            var text = '<p>Did not complete successfully </p>';
            App.alerterDanger(text);

          })
      } else {
        // the token is locked
        var text = '<p>Cannot make claim now!</p>';
        App.alerterDanger(text);
      }
    });
  },
  ratio: function () {
    var vaultBal = parseFloat(localStorage.getItem("EgorasVaultBalance"));
    var totalSupply = parseFloat(localStorage.getItem("totalSupply"));
    var egrVaultPrice = parseFloat(localStorage.getItem("egrVaultPrice"));

    var ratio = (vaultBal / totalSupply) * 100;

    $(".ratioValue").html(ratio.toFixed(2) + "%")
    var usdEgrValue = egrVaultPrice * vaultBal;
    $(".egrUSDValue").html(usdEgrValue.toFixed(2) + "$")

  },
  addminter: function (adrress, which) {
    App.showModal();
    let instance;
    if (which == 1) {
      instance = App.contracts.EgorasEUSD;
    } else {
      instance = App.contracts.EgorasCoin;
    }
    instance.methods.addMinter(adrress).send({
      from: App.account
    })
      .on('transactionHash', function (hash) {
        if (hash !== null) {
          var text = '<p>Minter added successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>. Thank you for using egoras.</p>';
          App.alerterSuccesss(text);
        }
      }).on('error', function (err) {
        var text = '<p>Did not complete successfully </p>';
        App.alerterDanger(text);

      })

  },
  mint: function (adrress, which, amount) {
    App.showModal();
    let instance;
    if (which == 1) {
      instance = App.contracts.EgorasEUSD;
    } else {
      instance = App.contracts.EgorasCoin;
    }
    instance.methods.mint(adrress, web3.utils.toWei(amount.toString(), 'ether')).send({
      from: App.account
    })
      .on('transactionHash', function (hash) {
        if (hash !== null) {
          var text = '<p>Minter added successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>. Thank you for using egoras.</p>';
          App.alerterSuccesss(text);
        }
      }).on('error', function (err) {
        var text = '<p>Did not complete successfully </p>';
        App.alerterDanger(text);

      })

  },

}





$(window).on("load", function () {
  if (checkCookie("login-type")) {
    App.init();

  }
  $("#txtModalClose").click(function () {
    $("#txtModal").removeClass("show");
  });

});
$(document).ready(function () {
  setTimeout(checkBalance, 1000);

  setInterval(checkBalance, 10000);
  $("#searchMobileToggler").click(function () {
    $("#topSearchBar").slideDown("slow");
  });


});

function approveBtnTrigger() {
  $("#openApproveModal").trigger("click");
  $("#txtModal").removeClass("show");
}

function approveVaultBtnTrigger(which) {
  $("#whichCoin").val(which);
  $("#openApproveVaultModal").trigger("click");
  $("#txtModal").removeClass("show");
}

function checkBalance() {
  try {
    App.displayAccountInfo();

  } catch (error) {
    console.log(error);

  }
  try {
    App.ratio();
  } catch (error) {
    console.log(error);

  }

}

function sellNow() {
  localStorage.setItem('phoneObject', JSON.stringify($("#phoneData").val()));
  window.location.replace("/sell_now");
}

function initiateSend(params) {

  $("#sendTokenWhich").val(params);
  $("#sendTokenBtn").trigger("click");
}

function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

function enableWalletProvider(id) {
  $("#loginBtns").hide();
  $("#spinnerLoader").show();

  setCookie("login-type", id, 2);
  App.init(false);
}

function enableWalletProviderFromModal(id) {
  $("#loginBtns").hide();
  $("#spinnerLoader").show();

  setCookie("login-type", id, 2);
  App.init(true);
}


function readURL(input, preview) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $(preview).css('background-image', 'url(' + e.target.result + ')');
      $(preview).hide();
      $(preview).fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imageUpload").change(function () {

  readURL(this, "#imagePreview");
});

$("#imageUpload2").change(function () {

  readURL(this, "#imagePreview2");
});

$("#imageUpload3").change(function () {

  readURL(this, "#imagePreview3");
});

$("#imageUpload4").change(function () {

  readURL(this, "#imagePreview4");
});

$("#imageUpload5").change(function () {

  readURL(this, "#imagePreview5");
});