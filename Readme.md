# Asset Score
The Department of Energy
[Building Energy Asset Score](https://buildingenergyscore.energy.gov/)
(Asset Score) is a national
standardized tool for evaluating the physical and structural energy efficiency of
commercial and multifamily residential buildings. The scoring tool will store
user-provided data and generate an asset score and system evaluation for your
building envelope and mechanical and electrical systems. The tool will also
identify cost-effective upgrade opportunities and help you gain insight into
the energy efficiency potential of your building.
# API Sample Code
This repository contains sample code written in PHP that allows you to access Version 2 of
the Asset Score API.  The sandbox server for developers where you can experiment is
<https://api.labworks.org>.  The API documentation is at <https://api.labworks.org/api>.

This code can either be used as sample PHP code to call the API, or to run this as a hosted
test harness, clone and build the Docker container. Running the provided container will 
serve up a fully functioning test harness website.

# Running the test harness as a container
#### Requirements
- Docker (version 1.12.2 works, others may also)

#### Building
- Perform a git clone of this repo
- cd into the repor directory
- Build
    - docker build -t api-test-harness .
- Run
    - docker run -p 8000:80 -d -t --name test-harness api-test-harness
- Stop 
    - docker stop test-harness
- Delete
    - docker rm /test-harness
    
# Running the sample code stand alone
#### Requirements
 - PHP >= 5.6
 - Composer
 - Guzzle (will be installed via composer using the provided composer.lock|json files)
