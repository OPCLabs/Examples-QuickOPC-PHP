<!--$$Header: $-->
<!-- Copyright (c) CODE Consulting and Development, s.r.o., Plzen. All rights reserved. -->
<html>
<head><title>ReadAndDisplayMultipleItems.php</title></head>
<body>
<?php
    $ReadItemArguments1 = new COM("OpcLabs.EasyOpc.DataAccess.OperationModel.DAReadItemArguments");
    $ReadItemArguments1->ServerDescriptor->ServerClass = "OPCLabs.KitServer.2";
    $ReadItemArguments1->ItemDescriptor->ItemID = "Simulation.Random";

    $ReadItemArguments2 = new COM("OpcLabs.EasyOpc.DataAccess.OperationModel.DAReadItemArguments");
    $ReadItemArguments2->ServerDescriptor->ServerClass = "OPCLabs.KitServer.2";
    $ReadItemArguments2->ItemDescriptor->ItemID = "Trends.Ramp (1 min)";

    $ReadItemArguments3 = new COM("OpcLabs.EasyOpc.DataAccess.OperationModel.DAReadItemArguments");
    $ReadItemArguments3->ServerDescriptor->ServerClass = "OPCLabs.KitServer.2";
    $ReadItemArguments3->ItemDescriptor->ItemID = "Trends.Sine (1 min)";

    $ReadItemArguments4 = new COM("OpcLabs.EasyOpc.DataAccess.OperationModel.DAReadItemArguments");
    $ReadItemArguments4->ServerDescriptor->ServerClass = "OPCLabs.KitServer.2";
    $ReadItemArguments4->ItemDescriptor->ItemID = "Simulation.Register_I4";

    $arguments[0] = $ReadItemArguments1;
    $arguments[1] = $ReadItemArguments2;
    $arguments[2] = $ReadItemArguments3;
    $arguments[3] = $ReadItemArguments4;

    // Instantiate the client object
    $Client = new COM("OpcLabs.EasyOpc.DataAccess.EasyDAClient");

    // Perform the operation
    $results = $Client->ReadMultipleItems($arguments);

    // Display results
    for ($i = 0; $i < count($results); $i++)
    {
        // Note: An exception can be thrown from the statement below in case of failure. See other examples for proper error
        // handling  practices!
        printf("results[%d].Vtq: %s<br>", $i, $results[$i]->Vtq);
    }
?>
</body>
</html>
