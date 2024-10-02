import "dotenv/config"

export default () => {
  const env = Object.assign({
    URL: "https://example.com",
  }, process.env)
  if (!env.URL.endsWith("/")) {
    env.URL = `${env.URL}/`
  }
  return env
}
