const { Builder, By, WebDriver, until } = require("selenium-webdriver")
const { expect } = require("chai")

let driver = new Builder().forBrowser("chrome").build()

driver.get("http://localhost/Project/public/index")

test("The title should be 'BKSmart'", function(done) {
  this.timeout(8000)

  driver.wait(until.titleIs("BKSmart"), 4000).then(result => {
    expect(result).to.eql(true)
    done()
  })
})

test("Move to cart page", function(done) {
  this.timeout(8000)

  driver
    .wait(until.elementLocated(By.css(".cart-icon")), 10000)
    .click()
    .then(() => {
      driver.getCurrentUrl().then(url => {
        expect(url).to.eql("http://localhost/Project/public/cart")
        done()
      })
    })
})

after(function() {
  driver.quit()
})
