const ROUTE = "http://" + NETWORK_CONFIG.IP_SERVER + ":" + NETWORK_CONFIG.PORT_SERVER + "/session";
const ENDPOINT = "/session";

$(document).ready()
{
  $.ajax(
  {
    url: ROUTE + ENDPOINT, 
    success: function(result)
    {
      console.log("success: ", result.message);
    }
  });
}
