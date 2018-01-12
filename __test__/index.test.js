const { Builder, By, WebDriver, until } = require("selenium-webdriver")
const { expect } = require("chai")

let driver = new Builder().forBrowser("chrome").build()

driver.get("http://localhost/Project/public/index")

test("The title should be 'BKSmart'", function(done) {
  this.timeout(8000)

  driver.wait(until.titleIs('BKSmart'), 4000)

  driver
    .getTitle()
    .then(function(title) {
      expect(title).to.eql("BKSmart")
      done()
    })
  
})

after(function() {
  driver.quit()
})
