require("dotenv").config()

module.exports = () => {
  const env = Object.assign({
    URL: "https://example.com",
  }, process.env)
  if (!env.URL.endsWith("/")) {
    env.URL = `${env.URL}/`
  }
  return env
}
