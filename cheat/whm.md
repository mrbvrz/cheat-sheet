### Open Port from CSF Firewall

Open CSF from WHM web, `WHM > Plugins > ConfigServer Security & Firewall`, choose Firewall Configuration and enter the port in the **TCP_IN**, **TCP_OUT**, **UDP_IN**, **UDP_OUT** fields.

### Speedtest Command Line `speedtest-cli`

- Install `speedtest-cli1`

  ```
  curl -s https://packagecloud.io/install/repositories/ookla/speedtest-cli/script.rpm.sh | sudo bash
  ```
  
  ```
  sudo yum install speedtest
  ```
  
- Open port

  - TCP/UDP inbound/outbound port *8080* (OoklaServer)
  - TCP/UDP inbound/outbound port *5060* (OoklaServer)
  - TCP outbound port *443* to *.speedtest.net for updates and Let's Encrypt provisioning if enabled
  - All of the above ports are required to be open for any public internet IP as users will connect directly
 
